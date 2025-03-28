<?php

namespace Tests\Unit\Models;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;


    public function testIt_has_required_attributes()
    {
        $admin = Admin::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123')
        ]);

        $this->assertEquals('John Doe', $admin->name);
        $this->assertEquals('john@example.com', $admin->email);
        $this->assertTrue(Hash::check('password123', $admin->password));
    }

    public function testIt_can_be_created_with_valid_data()
    {
        $admin = Admin::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => bcrypt('password123')
        ]);

        $this->assertDatabaseHas('admins', [
            'id' => $admin->id,
            'name' => 'Jane Smith',
            'email' => 'jane@example.com'
        ]);
    }

    public function testIt_can_update_its_attributes()
    {
        $admin = Admin::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        $admin->update([
            'name' => 'John Smith',
            'email' => 'john.smith@example.com'
        ]);

        $this->assertEquals('John Smith', $admin->fresh()->name);
        $this->assertEquals('john.smith@example.com', $admin->fresh()->email);
    }

    public function testIt_can_be_deleted()
    {
        $admin = Admin::factory()->create();
        
        $admin->delete();
        
        $this->assertDatabaseMissing('admins', [
            'id' => $admin->id
        ]);
    }

    public function testIt_can_have_unique_email()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Admin::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123')
        ]);

        Admin::create([
            'name' => 'Jane Doe',
            'email' => 'john@example.com', // Same email
            'password' => bcrypt('password123')
        ]);
    }

    public function testIt_can_be_unverified()
    {
        $admin = Admin::factory()->unverified()->create();
        
        $this->assertNull($admin->email_verified_at);
    }

    public function testIt_can_be_verified()
    {
        $admin = Admin::factory()->unverified()->create();
        
        $admin->markEmailAsVerified();
        
        $this->assertNotNull($admin->email_verified_at);
    }

    public function testIt_hides_password_and_remember_token()
    {
        $admin = Admin::factory()->create();
        
        $adminArray = $admin->toArray();
        
        $this->assertArrayNotHasKey('password', $adminArray);
        $this->assertArrayNotHasKey('remember_token', $adminArray);
    }

    public function testIt_can_authenticate()
    {
        $admin = Admin::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password123')
        ]);

        $this->assertTrue(auth('admin')->attempt([
            'email' => 'admin@example.com',
            'password' => 'password123'
        ]));
    }
} 