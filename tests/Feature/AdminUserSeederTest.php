<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AdminUserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_seeder_creates_osella_admin_login(): void
    {
        $this->seed(UserSeeder::class);

        $this->assertDatabaseHas('users', [
            'name' => 'Admin',
            'email' => 'admin@osella.com',
        ]);

        $this->assertTrue(Auth::attempt([
            'email' => 'admin@osella.com',
            'password' => 'password123',
        ]));
        $this->assertSame('admin@osella.com', User::first()->email);
    }
}
