<?php

namespace Tests\Feature;

use App\Models\PersonContact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class PersonContactTest extends TestCase
{



    // DUVIDA: RefreshDatabase faz com que não consiga acessar o contato criado, ele roda a cada teste, tem uma forma de fazer ele rodar a cada classe?
    use RefreshDatabase;
    // DUVIDA: Por algum motivo não consigo utilizar essa propriedade nas funções
    // public $uriRequest = '/api/contatos';

    public function testCreatePersonContact()
    {

        // Utilities
        // $response->dumpHeaders();
        // $response->dump();
        $response = $this->postJson('/api/contatos' , [
            'contact' => 'PaulimDoTeste',
            'person_id' => 1,
            'contact_type_id' => 1
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
                ]);
    }

    public function testShowPersonContact(){
        $contato = PersonContact::factory()->create();

        // DUVIDA: o teste retorna 404 Not Found, mesmo a propriedade do $contato oferecendo o id a ser requisitado, colocar o id estaticamente para '1' também não funciona
        $response = $this->getJson("/api/contatos/{$contato->contact_type_id}");


        $response
            ->assertStatus(200)
            // Numero de chaves, talvez haja um jeito melhor?
            ->assertJsonCount(6, 'data');
}

    public function testShowMultiple(){
        //quantidade de criações
        $qtd = 10;

        PersonContact::factory()->count($qtd)->create();

        $response = $this->getJson('/api/contatos');

        // DUVIDA: da um $response->dump() e docker-compose exec app php artisan test; na moral, orgulho define
        $response
            ->assertStatus(200)
            ->assertJsonCount($qtd, 'data');
        }



    public function testUpdatePersonContact(){
        $contato = PersonContact::factory()->create();


        $mudado_para= [
            'contact' => 'PaulimDoTesteDiferenciado',
            'person_id' => 1,
            'contact_type_id' => 1,
            'id' => $contato->contact_type_id
        ];

        // DUVIDA: o teste retorna 404 Not Found, mesmo a propriedade do $contato oferecendo o id a ser requisitado, colocar o id estaticamente para '1' também não funciona
        $response = $this->putJson("/api/contatos/{$contato->contact_type_id}", $mudado_para);

        $response->dumpHeaders();

        $response->assertStatus(200)
                 ->assertJson(['pessoa' => $mudado_para]);
    }
}
