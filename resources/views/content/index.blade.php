@extends('layouts.app')



@section('content')
    <div class ="container">
        <div class="row">
            <div class="d-flex flex-wrap mt-5 justify-content-around ">
                @foreach ($posts as $post )
                <div class="card mb-5" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->author }}</h6>
                
                 <a href="{{ route("posts.show",$post->id) }}" class="card-link">Details</a> 
                 <a href="{{ route("posts.edit",$post->id) }}" class="card-link">Modifica</a> 
                 <form action="{{ route("posts.destroy",$post->id) }}" method="post">
                    @CSRF
                    @method("delete")
                    <button type="submit" class="btn btn-danger">ELIMINA</button>
                  </form>
                
                
                
                
                </div>
                </div>
                @endforeach
                
  

            
        </div>
    </div>

@endsection