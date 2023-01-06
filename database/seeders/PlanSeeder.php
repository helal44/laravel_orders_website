<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Plan::create([
            'name'=>'helal',
            'slug'=>'helal',
            'stripe_plan'=>'price_1MNDuZAKCs7rV1K1Vvtn5igv',
            'price'=>20,
            'descriptions'=>'busines plan'
        ]);
    }
}
