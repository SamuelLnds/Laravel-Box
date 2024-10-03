<?php

namespace Database\Factories;

use App\Models\StorageBox;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StorageBox>
 */
class StorageBoxFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StorageBox::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->company(),
            'size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'monthly_cost' => $this->faker->randomFloat(2, 10, 500),
            'availability' => $this->faker->boolean(),
            'tenant_id' => null, // locataire null tant que table tenants pas créée
        ];
    }
}
