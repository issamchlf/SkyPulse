<?php

namespace Tests\Feature\Http\Requests\Auth;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminLoginRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_validates_required_fields()
    {
        $request = new AdminLoginRequest();
        $validator = $request->rules();

        $this->assertArrayHasKey('email', $validator);
        $this->assertArrayHasKey('password', $validator);
        $this->assertContains('required', $validator['email']);
        $this->assertContains('required', $validator['password']);
    }

    public function test_it_validates_email_format()
    {
        $request = new AdminLoginRequest();
        $validator = $request->rules();

        $this->assertContains('email', $validator['email']);
    }

    public function test_it_authenticates_with_valid_credentials()
    {
        $admin = Admin::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password123')
        ]);

        $request = new AdminLoginRequest();
        $request->merge([
            'email' => 'admin@example.com',
            'password' => 'password123'
        ]);

        $request->authenticate();
        $this->assertTrue(Auth::guard('admin')->check());
    }

    public function test_it_fails_with_invalid_credentials()
    {
        $admin = Admin::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password123')
        ]);

        $request = new AdminLoginRequest();
        $request->merge([
            'email' => 'admin@example.com',
            'password' => 'wrongpassword'
        ]);

        $this->expectException(\Illuminate\Validation\ValidationException::class);
        $request->authenticate();
    }
} 