<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug){
        
        //$post = \DB::table('posts')->where('slug',$slug)->first(); // it's for fetching the data direct from the database
        
        $post = Post::where('slug',$slug)->firstOrFail(); //first() fetches only the first item matched in db
                                                            //firstOrFail matches and if not found then returns 404

        // if(!$post){
        //     abort(404);
        // }
        
        // $posts=[
        //     'my-first-post'=>'This is my first post',
        //     'my-second-post'=>'This is my second post',
            
        // ];
    
        // if(!array_key_exists($post,$posts)){
        //     abort(404, 'Sorry!!! The post was not found');
        // }
        return view('post',[
            'post'=>$post   //??'Nothing here yet'   //this is efficiently done above with the if 
        ]);
    
    }
}
