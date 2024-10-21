<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KTPFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'nama' => $this->faker->name(),
        'nik' => $this->faker->unique()->numerify('################'),
        'tanggal_lahir' => $this->faker->date(),
        'alamat' => $this->faker->address(),
        'foto' => null,
    ];
}

}
