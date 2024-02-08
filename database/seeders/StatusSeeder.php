<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\EmployeeStatus;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        $statuses = ['Active', 'On Leave', 'On Vacation', 'Terminated'];
        foreach ($statuses as $arr) {
            $EmployeeStatus = new EmployeeStatus();
            $EmployeeStatus->description = $arr;
            $EmployeeStatus->save();
        }
    }
}
