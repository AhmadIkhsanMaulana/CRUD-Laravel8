<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = Classes::factory()->count(5)->make();

        $no = 0;
        foreach($classes as $class) {
            $class->name = "Kelas $no";
            $class->save();
            $no++;
        }
    }
}
