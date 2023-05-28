<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
    try{

        return response()->json([
            'status_code' => 200,
            'status_message' => 'Le posts ont été récupérés.',
            'data' => Post::all()
        ]);

    } catch(Exception $e){
        return response()->json($e);
    }
   }

   public function store(CreatePostRequest $request){

        try {
                // dd($request);
            $post = new Post();
            $post->titre = $request->titre;
            $post->description = $request->description;
            $post->save();

            return response() -> json([
                'status_code' => 200,
                'status_message' => 'Le post a été ajouté',
                'date' => $post
        ]);

        } catch (Exception $e) {
            return response() -> json($e);
        }
   }

   public function update(EditPostRequest $request, Post $post){
        // $post = Post::find($id);
        // dd($post);
        try{
            $post -> titre = $request -> titre;
            $post -> description = $request -> description;
            $post->save();

            return response() -> json([
                'status_code' => 200,
                'status_message' => 'Le post a été modifié',
                'data' => $post

            ]);

        }catch(Exception $e){
            return response()->json($e);
        }

    }


    public function delete(Post $post){
        try{
            $post->delete();

            return response() -> json([
            'status_code' => 200,
            'status_message' => 'Le post a été supprimé',
            'data' => $post
            ]);
        } catch (Exception $e){
            return response()->json($e);
        }
    }
}

