<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_checkout()
    {
        $response = $this->get('/checkout');
        $response->assertRedirect('/login_checkout');
    }

    public function test_non_admin_cannot_access_admin_page()
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(403);
    }

    public function test_sql_injection_prevention()
    {
        $maliciousInput = "' OR 1=1; --";
        $response = $this->post('/login', [
            'email_account' => $maliciousInput,
            'password_account' => 'password',
        ]);
        $response->assertStatus(422);
    }

    public function test_xss_prevention()
    {
        $user = User::factory()->create();
        $maliciousInput = '<script>alert("XSS");</script>';
        $response = $this->actingAs($user)->post('/comments', ['content' => $maliciousInput]);
        $this->assertStringNotContainsString($maliciousInput, $response->getContent());
    }

    public function test_csrf_protection()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/products', [
            'name' => 'Product Without CSRF Token',
        ], [
            'X-CSRF-TOKEN' => '',
        ]);

        $response->assertStatus(419);
    }

    public function test_password_hashing()
    {
        $password = 'password123';
        $hashedPassword = Hash::make($password);

        $this->assertTrue(Hash::check($password, $hashedPassword));
    }

    public function test_login_with_invalid_password()
    {
        $user = User::factory()->create([
            'password' => Hash::make('correct-password'),
        ]);

        $response = $this->post('/login', [
            'email_account' => $user->email,
            'password_account' => 'wrong-password',
        ]);

        $response->assertRedirect('/login_checkout');
        $response->assertSessionHas('error', 'Email hoặc mật khẩu không chính xác!');
    }
}

