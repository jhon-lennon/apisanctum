<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCreatePost;
use App\Http\Requests\RequestUpdatePost;
use App\Services\PostUserService;
use Illuminate\Http\Request;
use Exception;


class PostUserController extends Controller
{
    public function __construct(protected PostUserService $service)
    {
    }
    public function index(){

        try {
        //$data = $this->service->postUserService(auth()->user()->id);
        $data = auth()->user()->post()->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);

    } catch (Exception $e) {

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ], 500);
    }
    }

    public function show($id){

        try {
        //$data = $this->service->postUserService(auth()->user()->id);
        $data = auth()->user()->post()->find($id);

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);

    } catch (Exception $e) {

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ], 500);
    }
    }

    public function create(RequestCreatePost $request){

        try {

        $data = $this->service->CreateService($request);

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);

    } catch (Exception $e) {

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ], 500);
    }
    }

    public function update(RequestUpdatePost $request, $id){

        try {
        $data = $this->service->updateService($request, $id);
    
        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);

    } catch (Exception $e) {

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ], 404);
    }
    }

    public function delete($id){

        try {
        $this->service->deleteService($id);
    
        return response()->json([
            'status' => true,
            'message' => ' Post deleted successfully'
        ], 200);

    } catch (Exception $e) {

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ], 404);
    }
    }


}
