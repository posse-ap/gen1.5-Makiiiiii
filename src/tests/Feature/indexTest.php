<?php

namespace Tests\Feature;

use App\BigQuestion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class indexTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        // $response->assertStatus(200);

        // $response->assertSee("東京の難読地名クイズ");

        // $response->assertSee("AAA");

        factory(BigQuestion::class)->create(['name' => 'AAA']);
        factory(BigQuestion::class, 10)->create();

        $this->assertDatabaseHas('big_questions', [
            'name' => 'AAA',
        ]);
    }
}
