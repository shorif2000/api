<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserCrudTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCreatedSuccsessfully(){
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $data = [
            'email'=>'testCreate@gmail.com',
            'givenName' => 'firstname',
            'familyName'    => 'test surname',
            'password' => bcrypt('secret1234'),
            //'password_confirmation' => bcrypt('secret1234'),
        ];

        $this->json('POST', 'api/users', $data, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                'email',
                'givenName',
                'familyName',
                'id',
                'updated_at',
                'created_at'
            ]);
    }

    public function testDelete(){
        //$this->markTestIncomplete();
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $data = [
            'email'=>'testCRUD@gmail.com',
            'givenName' => 'firstname',
            'familyName'    => 'test surname',
            'password' => bcrypt('secret1234'),
            'password_confirmation' => bcrypt('secret1234'),
        ];
        $userToDelete = User::create($data);
        //$this->user->recipes()->save($recipe);
        $response = $this->json('DELETE',route('api.users',['user' => $userToDelete]));
        $response->assertStatus(204);
        //Assert there are is no user
        $this->assertEquals(false,User::where('email','testCRUD@gmail.com')->exists());
    }
}
