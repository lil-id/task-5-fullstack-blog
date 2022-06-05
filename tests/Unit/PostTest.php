<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function test_post_created_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'web');

        $postData = [
            "title" => "Nasi Padang",
            "content" => "Makanan khas yang berasal dari daerah padang",
            "image" => "",
            "user_id" => $user->id,
            "category_id" => "1"
        ];

        $this->json('POST', 'dashboard/posts/create', $postData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJson([
                "posts" => [
                    "title" => "Nasi Padang",
                    "content" => "Makanan khas yang berasal dari daerah padang",
                    "image" => "",
                    "user_id" => $user->id,
                    "category_id" => "1"
                ],
                "message" => "Created successfully"
            ]);
    }

    public function test_post_listed_posts_successfully()
    {

        $user = User::factory()->create();
        $this->actingAs($user, 'web');

        Post::factory()->create([
            "title" => "Pisang Ijo",
            "content" => "Makanan khas Indonesia yang berasal dari daerah Sulawesi Selatan",
            "image" => "",
            "user_id" => $user->id,
            "category_id" => "1",
        ]);

        $this->json('GET', 'dashboard/posts', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "posts" => [
                    [
                        "id" => 1,
                        "title" => "Pisang Ijo",
                        "content" => "Makanan khas Indonesia yang berasal dari daerah Sulawesi Selatan",
                        "image" => "",
                        "user_id" => $user->id,
                        "category_id" => "1"
                    ]
                ],
                "message" => "Retrieved successfully"
            ]);
    }

    public function test_post_get_detail_post_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'web');

        $postData = Post::factory()->create([
            "title" => "Pisang Ijo",
            "content" => "Makanan khas Indonesia yang berasal dari daerah Sulawesi Selatan",
            "image" => "",
            "user_id" => $user->id,
            "category_id" => "1"
        ]);

        // dd($postData);

        $this->json('GET', 'dashboard/posts/' . $postData->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "posts" => [
                    "title" => "Pisang Ijo",
                    "content" => "Makanan khas Indonesia yang berasal dari daerah Sulawesi Selatan",
                    "image" => "",
                    "user_id" => $user->id,
                    "category_id" => "1"
                ],
                "message" => "Retrieved successfully"
            ]);
    }

    public function test_post_update_post_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'web');

        $postData = Post::factory()->create([
            "title" => "Pisang Ijo",
            "content" => "Makanan khas Indonesia yang berasal dari daerah Sulawesi Selatan",
            "image" => "",
            "user_id" => $user->id,
            "category_id" => "1"
        ]);

        $payload = [
            "title" => "Soto Jepara",
            "content" => "Makanan khas Indonesia yang berasal dari daerah Jawa",
            "image" => ""
        ];

        $this->json('POST', 'dashboard/posts/' . $postData->id , $payload, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "posts" => [
                    "title" => "Soto Jepara",
                    "content" => "Makanan khas Indonesia yang berasal dari daerah Jawa",
                    "image" => ""
                ],
                "message" => "Updated successfully"
            ]);
    }

    public function test_post_delete_post_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'web');

        $postData = Post::factory()->create([
            "title" => "Pisang Ijo",
            "content" => "Makanan khas Indonesia yang berasal dari daerah Sulawesi Selatan",
            "image" => "",
            "user_id" => $user->id,
            "category_id" => "1"
        ]);

        $this->json('DELETE', 'dashboard/posts/' . $postData->id, [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
