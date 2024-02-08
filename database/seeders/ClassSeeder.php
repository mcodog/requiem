<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\EmployeeClass;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        $classes = ['Class A', 'Class B', 'Class C'];
        foreach ($classes as $arr) {
            $EmployeeClass = new EmployeeClass();
            $EmployeeClass->description = $arr;
            $EmployeeClass->save();
        }

        $this->call([
            StatusSeeder::class,
        ]);
    }
}
