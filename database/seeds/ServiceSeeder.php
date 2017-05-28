<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(['Эконом', 'Стандарт', 'Комплекс'] as $name) {
        
            $service = new Service([
                'name' => $name,
                'type' => 'basic'
            ]);

            $service->save();
        
        }

        foreach(['Мойка ковриков', 'Покрытие воском', 'Покрытие NANO', 'Химчистка дисков', 'Мойка двигателя', 'Очистка от мошек'] as $name) {
        
            $service = new Service([
                'name' => $name,
                'type' => 'additional'
            ]);

            $service->save();
        
        }

    }
}
