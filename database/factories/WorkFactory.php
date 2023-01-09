<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //

            "sujet" => $this->faker->realText(50, 2),
            "categorie" => $this->faker->randomElement(array('TFC', 'MEMOIRE', 'THESE')),
            "faculte" => $this->faker->randomElement(array('SCIENCES INFORMATIQUE')),
            "etudiant" => $this->faker->name,
            "annnee_etude" => $this->faker->numberBetween(2010, 2022),
            "nbr_pages"=> $this->faker->numberBetween(80, 120),
            "domaines_id" => $this->faker->numberBetween(1, 2),
            "path_document" => "travail.pdf",
            "status" => 1,
            "viewCounter" => 0,
        ];
    }
}
