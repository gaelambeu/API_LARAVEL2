<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){
    return 'Liste des articles';
   }

   public function store(CreatePostRequest $request){

        $post = new Post();
        $post->titre = 'Titre exemple';
        $post->description = 'Description exemple';
        $post->save();
   }
}

