<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Menu;
use App\Models\User;
use App\Models\Visa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class menu_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

       // Menu::factory()->has(Image::factory()->count(10),'image')->create();

       //User::factory()->count(10)->create();
       Visa::factory()->count(20)->create();

    }
}
