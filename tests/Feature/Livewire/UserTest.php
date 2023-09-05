<?php

namespace Tests\Feature\Livewire;

use App\Livewire\UserDatatable;
use App\Livewire\UserForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(UserForm::class)
            ->assertStatus(200);

        Livewire::test(UserDatatable::class)
            ->assertStatus(200);
    }

    /** @test */
    public function page_has_livewire_components()
    {
        $this->get('/users')
            ->assertSeeLivewire(UserDatatable::class);

        $this->get('/users/form')
            ->assertSeeLivewire(UserForm::class);
    }

    /** @test */
    public function show_users_in_datatable()
    {
        User::factory()->create(['email' => 'livewire@unittest.com']);
        User::factory()->create(['email' => 'livewire1@unittest.com']);
        User::factory()->create(['email' => 'livewire2@unittest.com']);

        Livewire::test(UserDatatable::class)
            ->assertSee('livewire@unittest.com')
            ->assertSee('livewire1@unittest.com')
            ->assertSee('livewire2@unittest.com');
    }

    /** @test */
    public function user_form_properties()
    {
        Livewire::test(UserForm::class)
            ->set('name', 'unittest')
            ->assertSet('name', 'unittest', true);
    }

    /** @test */
    public function user_form_validations()
    {
        Livewire::test(UserForm::class)
            ->call('save')
            ->assertHasErrors([
                'name',
                'email',
                'languages',
                'photo',
            ]);
    }
}
