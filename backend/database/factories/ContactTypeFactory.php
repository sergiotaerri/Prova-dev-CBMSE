<?php

namespace Database\Factories;

use App\Models\ContactType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // DUVIDA: better way to generate this/ use the default types
            'name' => $this->faker->creditCardType,
        ];
    }
}
