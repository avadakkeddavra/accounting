<?php

use Illuminate\Database\Seeder;

class UsersProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('eu_US');
        DB::table('users-products')->delete();



        for($i = 1; $i < 101; $i++){

            $user_id = $faker->numberBetween($min = 1, $max = 3);
            $product_id = $faker->numberBetween($min = 1, $max = 20);

            DB::table('users-products')->insert([
                'id' => $i,
                'user_id' => 13,
                'product_id' => $product_id,
                'created_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
