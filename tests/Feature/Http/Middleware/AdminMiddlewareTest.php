<?php

namespace Tests\Feature\Http\Middleware;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;

class AdminMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_redirects_to_login_when_not_authenticated()
    {
        $request = Request::create('/admin/dashboard');
        $middleware = new AdminMiddleware();
        $response = $middleware->handle($request, function () {});

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('admin.login'), $response->headers->get('Location'));
    }

    public function test_it_allows_access_when_authenticated_as_admin()
    {
        $admin = Admin::factory()->create();
        Auth::guard('admin')->login($admin);

        $request = Request::create('/admin/dashboard');
        $middleware = new AdminMiddleware();
        $response = $middleware->handle($request, function () {
            return response()->json(['message' => 'Success']);
        });

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Success', json_decode($response->getContent())->message);
    }

    public function test_it_redirects_to_login_when_authenticated_as_user()
    {
        $user = \App\Models\User::factory()->create();
        Auth::login($user);

        $request = Request::create('/admin/dashboard');
        $middleware = new AdminMiddleware();
        $response = $middleware->handle($request, function () {});

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('admin.login'), $response->headers->get('Location'));
    }
} 