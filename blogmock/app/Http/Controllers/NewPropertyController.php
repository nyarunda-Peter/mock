<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\Type;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class NewPropertyController extends Controller
{
    function stepOne(){
        return view('property.addproperty', [
            'categories' => Category::all(),
            'types' => Type::all()
        ]);
    }
    
    function stepTwo(){
        $features = Feature::all();

        $grouped = [];

        foreach($features as $feature){

            if(!array_key_exists($feature->type, $grouped)){
                $grouped[$feature->type] = [];
            }

            // ['Internal'['AirCon',.., 'FIber'], 'External'['Park',..,'pool']]
            array_push($grouped[$feature->type], $feature);
        }

        return view('property.addpropertydetails',[
            'features' => $grouped
        ]);
    }

    function store(Request $request){

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

        //Making slug unique

        $property->slug .= $property->id;

        if(!$property->save()){
            DB::rollBack();

            return back()->withInput()->withErrors([
                'status' => 'Unable to add property. Please try again'
            ]);
        }

        // Main Image Upload

        $result = $this->uploadMainImage($property, $request->file('main_image'));

        if(!is_bool($result)){
            DB::rollBack();

            return back()->withInput()->withErrors([
                'status' => 'Unable to add property. Please try again',
                'exception' => $result->getMessage()
            ]);
        }

        // Multiple Images Upload

        $result = $this->uploadOtherImages($property, $request->file('other_image'));
       
        if(!is_bool($result)){
            DB::rollBack();

            return back()->withInput()->withErrors([
                'status' => 'Unable to add property. Please try again',
                'exception' => $result->getMessage()
            ]);
        }

        // Feature Registration

        $result = $this->saveFeatures($property, $request->post('features'));

        if(!is_bool($result)){
            DB::rollBack();

            return back()->withInput()->withErrors([
                'status' => 'Unable to add property. Please try again',
                'exception' => $result->getMessage()
            ]);
        }

        //Commiting
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

            return true;

        }catch(Exception $e){
            return $e;
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
            return $e;
        }
    }

    /**
     * @param Property $property
     * @param UploadedFile[] $files
     */
    function saveFeatures($property, $selected_features){
        try{

            foreach($selected_features as $feature){
                $property->features()->attach($feature);
            }

            return true;
        }catch(Exception $e){
            return $e;
        }
    }
}
