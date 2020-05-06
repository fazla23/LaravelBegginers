@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css"/>
@endsection

@section('content')

<div id="wrapper">
<div>
<h3><b>Edit Article</b></h3>
</div>
<form action="/articles/{{$article->id}}" method ="POST">
@method('PUT')
@csrf
<div>

<div class="field">
  <label class="label">Title</label>
  <p class="control">
    <input class="input" type="text" placeholder="Title" name="title" value="{{$article->title}}">
  </p>
</div>

<div class="field">
  <label class="label">Exerpt</label>
  <p class="control">
    <input class="input" type="text" placeholder="Exerpt" name="excerpt" value="{{$article->excerpt}}">
  </p>
</div>

<div class="field">
  <label class="label">Body</label>
  <p class="control">
    <textarea class="textarea" placeholder="Body" name="body" >{{$article->title}}</textarea>
  </p>
</div>
</div>


<div class="field is-grouped">
  <p class="control">
    <button class="button is-primary">Submit</button>
  </p>
</div>

</form>
</div>
@endsection