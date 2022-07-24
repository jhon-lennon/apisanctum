<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLogin;
use App\Http\Requests\RequestRegister;
use App\Services\AuthService;
use Exception;

class AuthController extends Controller
{
    public function __construct(protected AuthService $service)
    {
    }

    public function createUser( RequestRegister $request)
    {
        try {
            $user = $this->service->registerService($request);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function loginUser(RequestLogin $request)
    {
        try {
            $user = $this->service->loginService($request);

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
