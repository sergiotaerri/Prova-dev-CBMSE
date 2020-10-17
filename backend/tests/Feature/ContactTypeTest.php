<?php

namespace Tests\Feature;

use App\Models\ContactType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTypeTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateContactType()
    {

        $response = $this->postJson('/api/tipos-contato', [
            'name' => "Telefone",
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

        ContactType::factory()->count($qtd)->create();

        $response = $this->getJson('/api/tipos-contato');

        $response
            ->assertStatus(200)
            ->assertJsonCount($qtd, 'data');
    }
}
