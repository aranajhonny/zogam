<?php

use Illuminate\Database\Seeder;

class vehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('vehiculos')->insert([
            'placa' => str_random(10),
            'marca' => str_random(10),
            'modelo' => str_random(10),
            'anio' => '2015',
            'serial-motor' => str_random(10),
            'serial-carro' => str_random(10),
            'color' => str_random(10),
            'tipo' => str_random(10),
            'propietario' => str_random(10),
            'telf-prop' => str_random(10),
            'email-prop' => str_random(10).'@gmail.com',
        ]);
    }
}
