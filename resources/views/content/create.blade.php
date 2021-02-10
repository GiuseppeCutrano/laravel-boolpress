@extends('layouts.app')



@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-center justify-content-center ">
            <form method="POST" action="{{ route("posts.store")}}">
                @csrf
                @method('Post')
                <div class="form-group">
                    <label for="title">Titolo</label>
                    <input type="text" class="form-control mb-2" value="{{ old("title") }}" name="title"id="title" aria-describedby="emailHelp"
                        placeholder="Inserisci il Titolo">
                        
                    <label for="author">Autore</label>
                    <input type="text" class="form-control mb-2"  name="author" id="author" value ="{{ old("author") }} "aria-describedby="emailHelp"
                        placeholder="Inserisci nome Autore">

                        
                        <div class="mb-3">
                            <h4 class="mt-2">Seleziona Categoria</h4>
                            
                            @foreach ($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="categories"
                                    value="{{ $category['id'] }}" id="categories1">
                                <label class="form-check-label" for="categories1">
                                    {{ $category['title'] }}
                                </label>
                            </div>
                        @endforeach
                            
                            <h4 class="mt-2">Inserisci la descrizione</h4>
                            <div class="mb-3">
                                <textarea name="description" class="form-control"></textarea>
                                <fieldset>
                                <h4 class="mt-4">Seleziona i tag</h4>
                                @foreach ($tags as $tag)
                                    
                                <div class="form-check ">
                                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag["id"] }}" id="tags">
                                    <label class="form-check-label" for="tags">
                                       {{ $tag['name'] }}
                                    </label>
                                </div>
                                @endforeach
                            </fieldset>
                            </div>
                        </div>


                                
                       
                   
                    
                    
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    
                </div>
                
                
               
                
            </form>
        </div>
    </div>
@endsection