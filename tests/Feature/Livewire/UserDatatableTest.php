<?php

namespace Tests\Feature\Livewire;

use App\Livewire\UserDatatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserDatatableTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UserDatatable::class)
            ->assertStatus(200);
    }
}
