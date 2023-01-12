<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Emergency;
use App\Models\Estatu;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incidencia>
 */
class IncidenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        $subcategory = Subcategory::all()->random();
        $category = Subcategory::where('id', $subcategory->id)->get();
        // $subcategory = Subcategory::all();
        // $subcategory = Subcategory::where('category_id', $category->id);

        return [
            'titulo' => $name,
            'slug' => Str::slug($name),
            'descripcion' => $this->faker->text(50),
            'user_id' => User::all()->random()->id,
            // 'crea_id' => User::all()->random()->id,

            

            // 'subcategory_id' => $subcategory->id,
            'subcategory_id' => $subcategory->id,
            
            
            // 'category_id' => Category::all()->random()->id,
            'category_id' => $subcategory->category_id,


            'emergency_id' => Emergency::all()->random()->id,
            
            'estatu_id' => Estatu::all()->random()->id,
        ];
    }
}
