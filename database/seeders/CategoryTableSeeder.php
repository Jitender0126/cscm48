<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $action= Category::create([
            'name'=>'Action movies',
            'slug'=>'action',
            'description'=>'This blog is only for discussion on Action movies',
            'image'=>'',
        ]);


        $SciFI= Category::create([
            'name'=>'SciFI movies',
            'slug'=>'SciFI',
            'description'=>'This blog is only for discussion on SciFI movies',
            'image'=>'',
        ]);

    }
}
