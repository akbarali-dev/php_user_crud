<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCrudTest extends TestCase
{
    use RefreshDatabase;

    protected $authUser;

    protected function setUp(): void
    {
        parent::setUp();
        // Har bir testda login bo‘lgan user
        $this->authUser = User::factory()->create();
        $this->actingAs($this->authUser);
    }

    /** @test */
    public function it_can_create_a_user()
    {
        $response = $this->post(route('users.store'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'secret123',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    /** @test */
    public function it_cannot_create_user_with_duplicate_email()
    {
        User::factory()->create(['email' => 'test@example.com']);

        $response = $this->post(route('users.store'), [
            'name' => 'Duplicate User',
            'email' => 'test@example.com',
            'password' => 'secret123',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $response = $this->put(route('users.update', $user->id), [
            'name' => 'Updated Name',
            'email' => $user->email,
            'password' => 'newpass123',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
        ]);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user->id));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    /** @test */
    public function it_returns_error_if_user_not_found_on_delete()
    {
        $response = $this->delete(route('users.destroy', 9999));

        $response->assertStatus(404);

    }
}
