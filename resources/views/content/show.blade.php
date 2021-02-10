@extends('layouts.app')


@section('content')


<div class="card d-flex  mt-5 justify-content-around"  style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Slug: {{ $detail["slug"] }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">Id_cat: {{ $category["id"] }}</h6>
      <h4>Tag</h4>
      @foreach ($tags as $tag)
  
          <h5 class="card-title">  {{ $tag["name"] }}</a></h5>
      @endforeach
      
      <p class="card-text">{{ $detail["description"]}}</p>
      
      
    </div>
  </div>

@endsection