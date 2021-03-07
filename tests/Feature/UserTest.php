<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        //Create user
        $data = [
            'email'=>'test@gmail.com',
            'givenName' => 'firstname',
            'familyName'    => 'test surname',
            'password' => bcrypt('secret1234'),
            'password_confirmation' => bcrypt('secret1234'),
        ];
        User::create($data);
        //attempt login
        $response = $this->json('POST',route('api.login'),[
            'email' => 'test@gmail.com',
            'password' => 'secret1234',
        ]);
        //Assert it was successful and a token was received
        $response->assertStatus(200);
        $this->assertArrayHasKey('access_token',$response->json());
        //Delete the user
        User::where('email','test@gmail.com')->delete();
    }
}
