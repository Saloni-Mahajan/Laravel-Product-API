<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('product_info')->insert([
	            'title' => $faker->title,
	            'description' => $faker->description,
                'type' => $faker->type,
                'is_active' => $faker->is_active,
	        ]);
	}   
    }
}
