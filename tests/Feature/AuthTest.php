<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{

    public function testRequiredFieldsForRegistration()
    {
        $this->json('POST', 'register', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "givenName" => ["The givenName field is required."],
                    "familyName" => ["The familyName field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                ]
            ]);
    }

    public function testRepeatPassword()
    {
        $userData = [
            'email' => 'firstname.surname@email.com',
            'givenName' => 'firstname',
            'familyName'    => 'test surname',
            'password' => 'secret1234',
        ];

        $this->json('POST', 'register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "password" => ["The password confirmation does not match."]
                ]
            ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessfulRegistration()
    {
        $data = [
            'email' => 'firstname.surname@email.com',
            'givenName' => 'firstname',
            'familyName'    => 'test surname',
            'password' => 'secret1234',
            'password_confirmation' => 'secret1234',
        ];

        $this->json('POST',route('register'),$data, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                'user' => [
                    'id',
                    'givenName',
                    'familyName',
                    'email',
                    'created_at',
                    'updated_at'
                ],
                'access_token',
                'token_type'
            ]);

        //Delete data
        User::where('email','firstname.surname@email.com')->delete();
    }
}
