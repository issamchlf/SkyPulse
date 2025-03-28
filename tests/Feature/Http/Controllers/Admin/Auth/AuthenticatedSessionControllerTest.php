<?php

namespace Tests\Feature\Http\Controllers\Admin\Auth;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class AuthenticatedSessionControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::factory()->create();
    }

    public function test_can_view_admin_login_page()
    {
        $response = $this->get(route('admin.login'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.auth.login');
    }



    public function test_can_login_as_admin()
    {
        $credentials = [
            'email' => $this->admin->email,
            'password' => 'password'
        ];

        $response = $this->post(route('admin.login'), $credentials);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated('admin');
    }

    public function test_cannot_login_with_invalid_credentials()
    {
        $credentials = [
            'email' => $this->admin->email,
            'password' => 'wrong_password'
        ];

        $response = $this->post(route('admin.login'), $credentials);

        $response->assertSessionHasErrors('email');
        $this->assertGuest('admin');
    }

    public function test_cannot_login_with_nonexistent_email()
    {
        $credentials = [
            'email' => 'nonexistent@example.com',
            'password' => 'password'
        ];

        $response = $this->post(route('admin.login'), $credentials);

        $response->assertSessionHasErrors('email');
        $this->assertGuest('admin');
    }

    public function test_can_logout_as_admin()
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('adminlogout'));

        $response->assertRedirect('/');
        $this->assertGuest('admin');
    }



    public function test_can_access_admin_dashboard_when_authenticated()
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.dashboard');
        $this->assertAuthenticated('admin');
    }

    public function test_remember_me_functionality()
    {
        $credentials = [
            'email' => $this->admin->email,
            'password' => 'password',
            'remember' => true
        ];

        $response = $this->post(route('admin.login'), $credentials);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated('admin');
        
        // Check if remember token is set
        $this->assertNotNull($this->admin->fresh()->remember_token);
    }

   

   
} 