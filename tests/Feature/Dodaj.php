<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Knjiga;

class DodajKnjigu extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        $podaci=Knjiga::factory()->make([
            'naslov'=>'Nova Knjiga',
            'autor'=>"Novi autor",
            'godina_izdanja'=>2022      
          ]);

          $response=$this->post('/knjige', $podaci->toArray());

          $response->assertRedirect('/knjige');
          $this->assertDatabaseHas('knjige', $podaci->toArray());
    }
}
