<?php

namespace Database\Seeders;

use App\Models\medicine;
use App\Models\subscription_plan;
use App\Models\treatment_plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        treatment_plan::create(['name' => 'Restoration', 'status' => 0]);
        treatment_plan::create(['name' => 'Pulpectomy', 'status' => 0]);
        treatment_plan::create(['name' => 'Pulpotomy', 'status' => 0]);
        treatment_plan::create(['name' => 'Operculectomy', 'status' => 0]);
        treatment_plan::create(['name' => 'Abscess Drainage', 'status' => 0]);
        treatment_plan::create(['name' => 'Cyst Enucleation', 'status' => 0]);
        treatment_plan::create(['name' => 'Polishing', 'status' => 0]);
        treatment_plan::create(['name' => 'Curettage with Scaler', 'status' => 0]);
        treatment_plan::create(['name' => 'Scaling', 'status' => 0]);
        treatment_plan::create(['name' => 'Apisectomy', 'status' => 0]);
        treatment_plan::create(['name' => 'Abscess Drainage', 'status' => 0]);
        treatment_plan::create(['name' => 'Orthodontic Tratment', 'status' => 0]);
        treatment_plan::create(['name' => 'helloeas', 'status' => 1]);
        treatment_plan::create(['name' => 'Extraction', 'status' => 1]);
        treatment_plan::create(['name' => 'CAP', 'status' => 1]);
        treatment_plan::create(['name' => 'Root Canal Treatment', 'status' => 0]);
        treatment_plan::create(['name' => 'RCT+Cap', 'status' => 1]);
        treatment_plan::create(['name' => 'RE-RCT', 'status' => 1]);

        subscription_plan::create(['package_name' => 'Package - 01', 'basic_price' => 1000, 'package_price' => '600', 'duration' => '1', 'duration_types' => 'Months', 'descount' => 40, 'saved_price' => 400]);
        subscription_plan::create(['package_name' => 'Package - 02', 'basic_price' => 3000, 'package_price' => '2000', 'duration' => '3', 'duration_types' => 'Months', 'descount' => 33, 'saved_price' => 1000]);
        subscription_plan::create(['package_name' => 'Package - 03', 'basic_price' => 6000, 'package_price' => '4000', 'duration' => '6', 'duration_types' => 'Months', 'descount' => 33, 'saved_price' => 2000]);
        subscription_plan::create(['package_name' => 'Package - 04', 'basic_price' => 12000, 'package_price' => '6000', 'duration' => '12', 'duration_types' => 'Months', 'descount' => 50, 'saved_price' => 6000]);

        medicine::create(['name' => 'Tab. Napa 500mg']);
        medicine::create(['name' => 'Tab. Clacido 1gm', 'brand' => 'Amoxicillin with clavulanic acid']);
        medicine::create(['name' => 'Tab. Filmet 400']);
        medicine::create(['name' => 'Cap. Maxpro 40 mg']);
        medicine::create(['name' => 'Tab.Fimoxyclav 625mg']);
        medicine::create(['name' => 'Tab.Rubee 2mg']);
        medicine::create(['name' => 'Tab.Rubee 20mg']);
        medicine::create(['name' => 'Tab.Tory 120mg']);
        medicine::create(['name' => 'Mouthcare mouth wash']);
        medicine::create(['name' => 'Tab.Amodis 400mg']);
        medicine::create(['name' => 'tab. cefotil 250 mg', 'brand' => 'cefuroxime']);
        medicine::create(['name' => 'tab. tory 90 mg']);
        medicine::create(['name' => 'tab. maxpro 20 mg']);
        medicine::create(['name' => 'Tab. Xenole 500 mg', 'brand' => 'Naproxen+ Esomeprazole']);
        medicine::create(['name' => 'Tab. Cefotil 500 mg']);
        medicine::create(['name' => 'Cap. Cef-3  200mg', 'brand' => 'Cefixime']);
        medicine::create(['name' => 'susp. Lebac-forte']);
        medicine::create(['name' => 'syp. Flamex']);
    }
}
