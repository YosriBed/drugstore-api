<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Drug;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anthralin = new Ingredient();
        $anthralin->name = 'Anthralin';
        $anthralin->unit = 'mg';
        $anthralin->mass = 150;
        $anthralin->save();
        $anthralin->refresh();

        $salbutamol = new Ingredient();
        $salbutamol->name = 'Salbutamol';
        $salbutamol->unit = 'mg';
        $salbutamol->mass = 500;
        $salbutamol->save();
        $salbutamol->refresh();

        $phenylpropanolamine = new Ingredient();
        $phenylpropanolamine->name = 'Phenylpropanolamine';
        $phenylpropanolamine->unit = 'g';
        $phenylpropanolamine->mass = 1;
        $phenylpropanolamine->save();
        $phenylpropanolamine->refresh();

        $chlorphenamine = new Ingredient();
        $chlorphenamine->name = 'Chlorphenamine';
        $chlorphenamine->unit = 'g';
        $chlorphenamine->mass = 5;
        $chlorphenamine->save();
        $chlorphenamine->refresh();

        $paracetamol = new Ingredient();
        $paracetamol->name = 'Paracetamol';
        $paracetamol->unit = 'mg';
        $paracetamol->mass = 500;
        $paracetamol->save();
        $paracetamol->refresh();

        $antiCough = Drug::where('name', 'Anti Cough Pills')->first();
        $antiCough->ingredients()->attach([
            $paracetamol->id,
            $chlorphenamine->id
        ]);

        $antiFlu = Drug::where('name', 'Anti Flu Shot')->first();
        $antiFlu->ingredients()->attach([
            $phenylpropanolamine->id,
            $chlorphenamine->id
        ]);

        $seretide = Drug::where('name', 'Seretide')->first();
        $seretide->ingredients()->attach([
            $salbutamol->id,
            $paracetamol->id,
        ]);

        $insulin = Drug::where('name', 'Insulin Shot')->first();
        $insulin->ingredients()->attach([
            $paracetamol->id,
            $anthralin->id,
            $phenylpropanolamine->id
        ]);
    }
}
