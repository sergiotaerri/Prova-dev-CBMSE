<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Person;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    public function testCreatePerson()
    {

        $response = $this->postJson('/api/pessoas', [
            'first_name' => "Jorgim da Torre",
            'second_name' => "e do Tunel"
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    public function testShowMultiple()
    {
        //quantidade de criações
        $qtd = 10;

        Person::factory()->count($qtd)->create();

        $response = $this->getJson('/api/pessoas');

        $response
            ->assertStatus(200)
            ->assertJsonCount($qtd, 'data');
    }


}
