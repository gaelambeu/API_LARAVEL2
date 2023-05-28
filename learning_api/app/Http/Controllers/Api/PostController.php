<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
    return 'Liste des articles';
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
}

