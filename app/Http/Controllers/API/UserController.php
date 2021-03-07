<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    #[OpenApi\Operation]
    public function index()
    {
        //$users = User::all();
        //return response([ 'users' => UserResource::collection($users), 'message' => 'Retrieved successfully'], 200);
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    #[OpenApi\Operation]
    public function store(Request $request)
    {
        /*$data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'cost' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $user = User::create($data);

        return response(['user' => new UserResource($user), 'message' => 'Created successfully'], 201);
        */
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    #[OpenApi\Operation]
    public function show($id){
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     *
    public function show(User $user)
    {
        return response(['user' => new UserResource($user), 'message' => 'Retrieved successfully'], 200);
    }
     * */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    #[OpenApi\Operation]
    public function update(Request $request, User $user)
    {
        /*$user->update($request->all());

        return response(['user' => new UserResource($user), 'message' => 'Update successfully'], 200);*/
        $user->update($request->all());

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    #[OpenApi\Operation]
    public function destroy(User $user)
    {
        /*$user->delete();

        return response(['message' => 'Deleted']);*/
        $user->delete();

        return response()->json(null, 204);
    }
}
