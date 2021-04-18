<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Drug;
use Illuminate\Database\Seeder;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $behind = new Category();
        $behind->name = 'Behind the counter';
        $behind->save();
        $behind->refresh();

        $prescription = new Category();
        $prescription->name = 'Prescription Drugs';
        $prescription->save();
        $prescription->refresh();

        $antiCough = new Drug();
        $antiCough->name = 'Anti Cough Pills';
        $antiCough->description = 'Stops your coughing !';
        $antiCough->price = 10.9;
        $antiCough->picture = 'https://source.unsplash.com/random';
        $antiCough->category_id = $behind->id;
        $antiCough->save();

        $antiFlu = new Drug();
        $antiFlu->name = 'Anti Flu Shot';
        $antiFlu->description = 'Say goodbye to your common flu';
        $antiFlu->price = 9.9;
        $antiFlu->picture = 'https://source.unsplash.com/random';
        $antiFlu->category_id = $behind->id;
        $antiFlu->save();

        $seretide = new Drug();
        $seretide->name = 'Seretide';
        $seretide->description = 'Breathe like never before !';
        $seretide->price = 69.9;
        $seretide->picture = 'https://source.unsplash.com/random';
        $seretide->category_id = $prescription->id;
        $seretide->save();

        $insulin = new Drug();
        $insulin->name = 'Insulin Shot';
        $insulin->description = 'You will love sugar';
        $insulin->price = 39.9;
        $insulin->picture = 'https://source.unsplash.com/random';
        $insulin->category_id = $prescription->id;
        $insulin->save();
    }
}
