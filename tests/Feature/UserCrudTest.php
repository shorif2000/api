<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserCrudTest extends TestCase
{

    protected function authenticate(){
        $data = [
            'email'=>'testCRUD@gmail.com',
            'givenName' => 'firstname',
            'familyName'    => 'test surname',
            'password' => bcrypt('secret1234'),
            'password_confirmation' => bcrypt('secret1234'),
        ];
        $user = User::create($data);
        $this->user = $user;
        // return auth token
    }

    public function testDelete(){
        $this->markTestIncomplete();
        $token = $this->authenticate();
        $data = [
            'email'=>'testCRUD@gmail.com',
            'givenName' => 'firstname',
            'familyName'    => 'test surname',
            'password' => bcrypt('secret1234'),
            'password_confirmation' => bcrypt('secret1234'),
        ];
        $userToDelete = User::create($data);
        //$this->user->recipes()->save($recipe);
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST',route('user/destroy',['user' => $userToDelete]));
        $response->assertStatus(204);
        //Assert there are is no user
        $this->assertEquals(false,User::where('email','testCRUD@gmail.com')->exists());
    }
}
