<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct(protected User $model)
    {
    }

    public function update($request){

     $user = auth()->user();

     $user->name = $request->exists('name') ? $request->name : $user->name;
     $user->email = $request->exists('email') ? $request->email : $user->email;

     $user->save();

     return $user;

    }

       public function destroy(){

        auth()->user()->delete();
       }
}
