<?php

namespace App\Http\Controllers;

use App\Factories\MakeRegisterUserService;
use App\Factories\MakeUpdatePasswordService;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                $data['name'],
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

    public function updatePassword(UpdatePasswordRequest $request){
        try{
            $data = $request->validated();
            $updatePasswordService = MakeUpdatePasswordService::make();
            $response = $updatePasswordService->execute(
                Auth::user()->email,
                $data['new_password'],
                $data['password']
            );

            return response()->json($response, 200);
            
        }catch(Error $e){
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
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
