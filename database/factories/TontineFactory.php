<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tontine>
 */
class TontineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->name,
            'profit' => $this->faker->numberBetween(100, 1500) * 100,
            'periode' => $this->faker->randomElement(['day', 'week', 'month', 'year']),
            'delay' => function (array $attributes) {
                $periode = $attributes['periode'];
                switch ($periode) {
                    case 'day':
                        return $this->faker->numberBetween(1, 30); // Nombre aléatoire de jours
                    case 'week':
                        return $this->faker->numberBetween(1, 4); // Nombre aléatoire de semaines
                    case 'month':
                        return $this->faker->numberBetween(1, 12); // Nombre aléatoire de mois
                    case 'year':
                        return $this->faker->numberBetween(1, 10); // Nombre aléatoire d'années
                    default:
                        return 0; // Valeur par défaut si la période n'est pas reconnue
                    }
                },
            'amount' => $this->faker->numberBetween(1000, 15000) * 1000,
            'number_of_members' => $this->faker->numberBetween(5, 20),
            'description' => $this->faker->paragraph,
            'status' => 'active', // Vous pouvez définir le statut initial
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => ''
        ];
    }
}
