<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

        /**
     * @OA\Post(
     *      path="/api/register",
     *      operationId="storeUser",
     *      tags={"Auth"},
     *      summary="Store new user",
     *      description="Returns user data",
     * 
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                  type="object",
     *                      @OA\Property(
     *                      property="name",
     *                      type = "integer"
     *                  ),
     *                      @OA\Property(
     *                      property="email",
     *                      type = "string",
     *                  ),
     *                      @OA\Property(
     *                      property="password",
     *                      type = "string",
     *                  ),
     *              ),
     *          )
     *      )
     * ),
     * 
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * )
     */


    public function register(Request $request){
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ])->assignRole('company');

            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token,
            ]);
            
    }

    /**
     * @OA\Post(
     * path="/api/login",
     *   tags={"Auth"},
     *   summary="Login",
     *   operationId="login",
     *
     *   @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                  type="object",
     *                      @OA\Property(
     *                      property="username",
     *                      type = "string"
     *                  ),
     *                      @OA\Property(
     *                      property="password",
     *                      type = "string",
     *                  ),
     *              ),
     *          )
     *      )
     * ),  
     * 
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
   
            return response()->json([
                $success
            ]);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorized']);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            "Log out"
        ]);
    }

}
