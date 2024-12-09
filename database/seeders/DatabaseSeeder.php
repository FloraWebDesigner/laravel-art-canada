<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Booking;
use App\Models\Facility;
use App\Models\Provider;
use App\Models\Province;
use App\Models\Type;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.    
    *@return void
    */
   public function run()
   {
       User::truncate();
       Booking::truncate();
       Facility::truncate();
       Provider::truncate();
       Province::truncate();
       Type::truncate();

       User::factory()->count(5)->create();           
       Provider::factory()->count(3)->create();
        Province::create(['province_name' => 'Toronto']);
        Province::create(['province_name' => 'British Columbia']);
       Type::factory()->count(5)->create();
       Facility::factory()->count(30)->create();
       Booking::factory()->count(5)->create();
    }
}
