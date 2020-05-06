<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return view('welcome');
    
});

Route::get('/about', function () {
    
    $article = \App\Article::latest()->take(2)->get();

    return view('about',[
    'articles'=> $article
    ] 
    );  
});

Route::get('/articles','ArticlesController@index')->name('articles.index');
Route::get('/articles/create','ArticlesController@create');
Route::post('/articles','ArticlesController@store');
Route::get('/articles/{article}','ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit','ArticlesController@edit');
Route::put('/articles/{article}','ArticlesController@update');

Route::get('/contact', function () {
    
    return view('contact');
    
});

Route::get('/query', function () {
    // $name=request('name');
    
    // return view('test',[
    //     'name'=>$name
    // ]);
    return view('test',[            //inline catching query parameter
        'name'=>request('name')
    ]);
    
});


Route::get('/post/{post}',function($post){
    $posts=[
        'my-first-post'=>'This is my first post',
        'my-second-post'=>'This is my second post',
        
    ];

    if(!array_key_exists($post,$posts)){
        abort(404, 'Sorry!!! The post was not found');
    }
    return view('post',[
        'post'=>$posts[$post]   //??'Nothing here yet'   //this is efficiently done above with the if 
    ]);

});

Route::get('/posts/{post}','PostsController@show');