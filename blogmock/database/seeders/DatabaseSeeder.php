<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Property;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        //Truncating tables


        // User::truncate();
        // Property::truncate();
        // Category::truncate();
        // Type::truncate();

        //merging data to one user
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        $category = Category::factory()->create([
            'name' => 'Sale',
            'slug' => 'for-sale'
        ]);

        $type = Type::factory()->create([
            'name' => 'House',
            'slug' => 'house'
        ]);
        //creating dummy property data
        Property::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'type_id' => $type->id
        ]);

        $this->call(FeaturesSeeder::class);



        //Manual Seeding


        // $user = User::factory(1)->create();



        // $rent = Category::create([
        //     'name'=> 'Rent',
        //     'slug'=> 'for-rent'

        // ]);

        // $sale = Category::create([
        //     'name'=> 'Sale',
        //     'slug'=> 'for-sale'

        // ]);

        // $lease = Category::create([
        //     'name'=> 'Lease',
        //     'slug'=> 'for-lease'

        // ]);

        // $house = Type::create([
        //     'name'=> 'House',
        //     'slug'=> 'house'
        // ]);

        // $apartment = Type::create([
        //     'name'=> 'Apartment',
        //     'slug'=> 'apartment'
        // ]);

        // $plot = Type::create([
        //     'name'=> 'Plot',
        //     'slug'=> 'plot'
        // ]);


        // Property::create([
        //     'user_id' => '1',
        //     'category_id' => $rent->id,
        //     'type_id' => $house->id,
        //     'title' => 'First Property',
        //     'slug' => 'first-property',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo sed egestas egestas fringilla phasellus.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At lectus urna duis convallis. Sodales ut eu sem integer vitae justo. Quam elementum pulvinar etiam non quam lacus. Enim facilisis gravida neque convallis a cras. Tincidunt arcu non sodales neque sodales. Sed pulvinar proin gravida hendrerit lectus. Pellentesque pulvinar pellentesque habitant morbi tristique. Orci ac auctor augue mauris augue neque gravida in. Ac odio tempor orci dapibus ultrices in.</p>'

        // ]);

        // Property::create([
        //    'user_id' => '1',
        //     'category_id' => $sale->id,
        //     'type_id' => $apartment->id,
        //     'title' => 'Second Property',
        //     'slug' => 'second-property',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo sed egestas egestas fringilla phasellus.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At lectus urna duis convallis. Sodales ut eu sem integer vitae justo. Quam elementum pulvinar etiam non quam lacus. Enim facilisis gravida neque convallis a cras. Tincidunt arcu non sodales neque sodales. Sed pulvinar proin gravida hendrerit lectus. Pellentesque pulvinar pellentesque habitant morbi tristique. Orci ac auctor augue mauris augue neque gravida in. Ac odio tempor orci dapibus ultrices in.</p>'

        // ]);

        // Property::create([
        //     'user_id' => '1',
        //     'category_id' => $lease->id,
        //     'type_id' => $plot->id,
        //     'title' => 'Third Property',
        //     'slug' => 'third-property',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo sed egestas egestas fringilla phasellus.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At lectus urna duis convallis. Sodales ut eu sem integer vitae justo. Quam elementum pulvinar etiam non quam lacus. Enim facilisis gravida neque convallis a cras. Tincidunt arcu non sodales neque sodales. Sed pulvinar proin gravida hendrerit lectus. Pellentesque pulvinar pellentesque habitant morbi tristique. Orci ac auctor augue mauris augue neque gravida in. Ac odio tempor orci dapibus ultrices in.</p>'

        // ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
