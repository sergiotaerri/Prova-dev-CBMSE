<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\ContactType;
use App\Models\PersonContact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PersonContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contact' => $this->faker->streetName,
            'person_id' => Person::factory()->create(),
            'contact_type_id' => ContactType::factory()
                                            ->state(new Sequence(
                                                        ['name' => 'Telefone'],
                                                        ['name' => 'Celular'],
                                                        ['name' => 'Email'],
                                                        ['name' => 'Outros']))
                                            ->create()->id
        ];
    }
}
