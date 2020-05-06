@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css"/>
@endsection

@section('content')

<div id="wrapper">
<div>
<h3><b>Add new Article</b></h3>
</div>
<form action="/articles" method ="POST">
@csrf
<div>

<div class="field">
  <label class="label">Title</label>
  <p class="control">
    <input 
        class="input {{$errors->has('title')?'is-danger':''}}" 
        type="text" 
        placeholder="Title" 
        name="title"
        value="{{old('title')}}"
    >
  </p>

  @if($errors->has('title'))
    <p class="help is-danger">Title field is empty</p>
  @endif
</div>

<div class="field">
  <label class="label">Exerpt</label>
  <p class="control">
    <input 
        class="input @error('excerpt') is-danger @enderror " 
        type="text" 
        placeholder="Exerpt" 
        name="excerpt"
        value="{{old('excerpt')}}"
        >
  </p>

  @error('excerpt')
    <p class="help is-danger">Excerpt field is empty</p>
  @enderror
</div>

<div class="field">
  <label class="label">Body</label>
  <p class="control">
    <textarea 
        class="textarea @error('body') is-danger @enderror" 
        placeholder="Body" 
        name="body">{{old('body')}}</textarea>
  </p>
  @error('body')
    <p class="help is-danger">Body field is empty</p>
  @enderror
</div>

      <div class="field">
        <label class="label">Tags</label>
        <p class="control select">
          <select name="tags[]" 
          multiple
          >
          @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
          @endforeach
        </select>
        </p>
        @error('tags')
          <p class="help is-danger">{{$message}}</p>
        @enderror
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