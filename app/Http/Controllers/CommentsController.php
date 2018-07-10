<?php
/**
 * Created by PhpStorm.
 * User: Jovana
 * Date: 7/8/2018
 * Time: 11:21 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post){
        $this->validate(request(), ['body'=>'required|min:2']);
        $post->addComment(request('body'));
        return back();
    }

}