<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use \Tests\TestCase;

class UserManagmentTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @test
     */

    public function a_list_of_users_should_be_retrieved()
    {
        $users = User::factory(2)->create();

        $this->actingAs($users->first());

        $response = $this->json('get','v1/users');

        $response->seeJsonEquals([
            [
                'id' => $users->first()->id,
                'name' => $users->first()->name,
                'email' => $users->first()->email,
                'created_at' => $users->first()->created_at,
                'updated_at' => $users->first()->updated_at,
            ],
            [
                'id' => $users->last()->id,
                'name' => $users->last()->name,
                'email' => $users->last()->email,
                'created_at' => $users->last()->created_at,
                'updated_at' => $users->last()->updated_at,
            ]
        ]);
    }

    /**
    * @test
    */
    public function a_user_can_be_created()
    {
        $response = $this->json('POST','/register',[
            'name' => 'fernando',
            'email' => 'fernando@mail.com',
            'password' => '12345'
        ]);

        $response->assertCount(1, User::all());
    }

    /**
    * @test
    */
    public function a_user_can_edited()
    {
        $user = User::factory()->create();

        $this->actingAs($user);


    }
}

