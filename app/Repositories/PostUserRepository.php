<?php

namespace App\Repositories;

use App\Models\User;

class PostUserRepository
{
    public function __construct(protected User $model)
    {
    }

    public function update($request, $id){

     $post = auth()->user()->post()->find($id);

     $post->title = $request->exists('title') ? $request->title : $post->title;
     $post->description = $request->exists('description') ? $request->description : $post->description;
     $post->save();

     return $post;

    }

    public function store($request){

        $post = auth()->user()->post()->create([

            'title' => $request->title,
            'description' => $request->description
        ]);

        return $post;
   
       }

       public function destroy($id){

        auth()->user()->post()->find($id)->delete();
       }
}
