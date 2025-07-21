<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterClass;

class ClassNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class_name_arry = ['LKG', 'HKG', 'Class 1', 'Class 2', 'Class 3', 'Class 4', 'Class 5'];
        foreach ($class_name_arry as $class_name) {
            MasterClass::create([
                'title' => $class_name,
            ]);
        }
    }
}
