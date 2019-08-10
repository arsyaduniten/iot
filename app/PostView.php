<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    //

    public static function createViewLog($post, $request) {
            $postsView= new PostView();
            $postsView->post_id = $post->id;
            $postsView->session_id = $request->session()->get('key');
            $postsView->ip_address = $request->ip();
            $postsView->save();
    }
}
