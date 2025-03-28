<?php

namespace Tests\Feature\Http\Controllers\Admin\Auth;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ConfirmablePasswordControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::factory()->create();
    }

    public function test_can_view_password_confirmation_page()
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->get(route('password.confirm'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.confirm-password');
    }

    public function test_cannot_view_password_confirmation_page_without_auth()
    {
        $response = $this->get(route('password.confirm'));

        $response->assertRedirect(route('login'));
        $this->assertGuest('admin');
    }



    public function test_cannot_confirm_password_with_wrong_password()
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('password.confirm'), [
                'password' => 'wrong_password'
            ]);

        $response->assertSessionHasErrors('password');
        $this->assertFalse(session()->has('password_confirmed_at'));
    }

    public function test_cannot_confirm_password_without_auth()
    {
        $response = $this->post(route('password.confirm'), [
            'password' => 'password'
        ]);

        $response->assertRedirect(route('login'));
        $this->assertGuest('admin');
    }


} 