<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class NewPropertyController extends Controller
{
    function propertyDetailsForm(){
        $features = Feature::all();

        $grouped = [];

        foreach($features as $feature){
            if(!array_key_exists($feature->type, $grouped)){
                $grouped[$feature->type] = [];
            }

            array_push($grouped[$feature->type], $feature);
        }

        return view('property.addpropertydetails', [
            'features' => $grouped
        ]);
    }

    function index(Request $request){
        if($request->filled('category')){
            return $this->propertyDetailsForm();
        }

        $validator = validator($request->all(), [

        ]);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }

        // Add property
        DB::beginTransaction();

        // The current user
        /** @var User */
        $user = auth()->user();

        $property = $user->posts()->create([
            'category_id' => $request->post('category'),
            'type_id' => $request->post('type'),
            'slug' => \Illuminate\Support\Str::slug($request->post('title')),
            'title' => $request->post('title'),
            'excerpt' => $request->post('description'),
            'body' => $request->post('description'),
            'overview' => [
                'bedrooms' => $request->post('bedrooms'),
                'bathrooms' => $request->post('bathrooms'),
                'price' => $request->post('price'),
                'price_unit' => $request->post('price_unit'),
                'size' => $request->post('size'),
                'dimensions' => $request->post('dimensions'),
                'locality' => $request->post('locality')
            ]
        ]);

        // Images
        if(!$this->uploadMainImage($property, $request->file('main_image'))){
            DB::rollBack();

            return back()->withInput()->withErrors([
                'status' => 'Unable to add property. Please try again'
            ]);
        }

        if(!$this->uploadOtherImages($property, $request->file('other_image'))){
            DB::rollBack();

            return back()->withInput()->withErrors([
                'status' => 'Unable to add property. Please try again'
            ]);
        }

        // Features
        if(!$this->saveFeatures($property, $request->post('features'))){
            DB::rollBack();

            return back()->withInput()->withErrors([
                'status' => 'Unable to add property. Please try again'
            ]);
        }

        DB::commit();
        return redirect()->route('view_single_property', [
            'post' => $property->slug
        ]);

    }

    /**
     * @param Property $property
     * @param UploadedFile $file
     */
    function uploadMainImage($property, $file){
        try{
            return $property->images()->create([
                'path' => $file->store(PropertyImage::UPLOAD_FOLDER, 'public'),
                'is_main' => true
            ]);
        }catch(Exception $e){
            return false;
        }
    }

    /**
     * @param Property $property
     * @param UploadedFile[] $files
     */
    function uploadOtherImages($property, $files){
        try{
            foreach($files as $file){
                $property->images()->create([
                    'path' => $file->store(PropertyImage::UPLOAD_FOLDER, 'public'),
                    'is_main' => false
                ]);
            }

            return true;
        }catch(Exception $e){
            return false;
        }
    }

    /**
     * @param Property $property
     * @param UploadedFile[] $files
     */
    function saveFeatures($property, $selected_features){
        try{
            foreach($selected_features as $feature){
                $property->features()->create([
                    'feature_id' => $feature
                ]);
            }
        }catch(Exception $e){
            return false;
        }
    }
}
