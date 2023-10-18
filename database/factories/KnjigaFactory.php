<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Knjiga;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Knjiga>
 */
class KnjigaFactory extends Factory
{
    protected $model=Knjiga::class;
    public function definition()
    {
        return [
            'naslov'=>$this->faker->sentence,
            'autor'=>$this->faker->name,
            'godina_izdanja'=>$this->faker->year,
        ];
    }

}
