<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use App\User;


class DetailController extends Controller
{
    //
    public function showbyId($id) {
        $post = Post::find($id);
        
        return view('Detail',['postID' => $post]);
    }
}
