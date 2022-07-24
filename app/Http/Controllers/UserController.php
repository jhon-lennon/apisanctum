<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUpdateUser;
use App\Services\UserService;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    public function __construct(protected UserService $service)
    {
        
    }
    public function logout(){

        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout Successfully'
        ], 200);

    }

    public function show(){
        
        return response()->json([
            'status' => true,
            'user' => auth()->user()
        ], 200);

    }

    public function update(RequestUpdateUser $request){

        try {
            $user = $this->service->updateService($request);

            return response()->json([
                'status' => true,
                'user' => $user
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function delete(){
        try {
            $this->service->deleteService();
        
            return response()->json([
                'status' => true,
                'message' => ' User deleted successfully'
            ], 200);
    
        } catch (Exception $e) {
    
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
