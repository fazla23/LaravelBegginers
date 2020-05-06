<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(){

        if(request('tag')){
            $articles= Tag::where('name',request('tag'))->firstOrFail()->articles;
        }
        else
        {
            $articles = Article::latest()->paginate(2);
        }
        
        return view('articles.index',compact('articles'));
    }

    public function show(Article $article){
        return view('articles.show',[
            'article'=>$article
        ]);
    }

    public function create(){
        
        return view('articles.create',[
            'tags'=>Tag::all()
        ]);
    }

    public function store(){

        //Article::create($this->validateArticle());
        $this->validateArticle();

        $article=new Article(request(['title','excerpt','body']));
        $article->user_id=1;
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect('/articles'); 
    }

    public function edit(Article $article){
        
        //$article = \App\Article::find($id);
        
        return view('articles.edit',compact('article'));
    }

    public function update(Article $article){

        $article->update($this->validateArticle());

        return redirect('/articles');
    }

    private function validateArticle(){
        $validateArticle = request()->validate([
            'title'=>'required|min:3',
            'excerpt'=>'required',
            'body'=>'required',
            'tags'=>'exists:tags,id'
        ]);
        return $validateArticle ;
    }

}
