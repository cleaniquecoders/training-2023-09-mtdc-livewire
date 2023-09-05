<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Todo::class)
            ->assertStatus(200);

        $this->get('/todo')
            ->assertSeeLivewire(Todo::class);
    }
}
