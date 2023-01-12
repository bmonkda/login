<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // con el último parámetro en false se guarda la url de la siguiente manera imagen.jpg
            'url' => 'incidencias/' . $this->faker->image('public/storage/incidencias', 640, 480, null, false), // incidencias/imagen.jpg
        ];
    }
}
