<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Listing;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        
$user = User::factory()->create([
    'name' => 'John Doe',
    'email' =>'john@gmail.com'
]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
        
        // Listing::create([
        //     'title' =>'Laravel Senior Developer',
        //     'tags' =>'laravel, javascript',
        //     'company' =>'Acme Corp',
        //     'location' =>'Boston, MA',
        //     'email' =>'email1@email.com',
        //     'website' =>'https://www.acme.com',
        //     'description' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        //     Dicta, unde non. 
        //     Totam placeat laborum provident, suscipit ratione laudantium cupiditate eaque?'
        // ]);


        // Listing::create([
        //     'title' =>'Full-Stack Engineer',
        //     'tags' =>'laravel, backend,api',
        //     'company' =>'Stark Industries',
        //     'location' =>'New York, NY',
        //     'email' =>'email2@email.com',
        //     'website' =>'https://www.starkindustries.com',
        //     'description' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        //     Dicta, unde non. 
        //     Totam placeat laborum provident, suscipit ratione laudantium cupiditate eaque?'
        // ]);
    }
}