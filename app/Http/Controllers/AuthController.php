<?php

namespace App\Http\Controllers;

use App\Factories\MakeRegisterUserService;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use InvalidArgumentException;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(RegisterRequest $request)
    {
        try{
            $data = $request->validated();
            $userRegisterService = MakeRegisterUserService::make();
            $user= $userRegisterService->execute(
                $data['email'],
                $data['nome'],
                $data['password']
            );

            return response()->json([
            'user' => UserResource::make($user['user']),
            'token' => $user['token'],
        ], 201);

        }catch(\InvalidArgumentException $e){
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
