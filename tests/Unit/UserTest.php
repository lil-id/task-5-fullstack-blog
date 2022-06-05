<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $this->assertTrue(true);
    // }
    /** @test */
    public function test_successfull_registration() {

        $userData = [
            'name' => 'xxxx',
            'email' => 'sample@test.com',
            'password' => Hash::make('sample123'),
         ];

        $this->actingAs($userData, 'web');

        $this->json('POST', 'register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "user" => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                ],
                "access_token",
                "message"
            ]);
    }

    public function testSuccessfulLogin()
    {
        $user = User::factory()->create([
           'email' => 'sample@test.com',
           'password' => Hash::make('sample123'),
        ]);
        
        $this->actingAs($user, 'web');


        $loginData = ['email' => 'sample@test.com', 'password' => 'sample123'];

        $this->json('POST', 'login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
               "user" => [
                   'id',
                   'name',
                   'email',
                //    'email_verified_at',
                   'created_at',
                   'updated_at',
               ],
                "access_token",
                "message"
            ]);

        $this->assertAuthenticated();
    }
}
