<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\PostModel;
use App\CategoriesModel;
use App\PostInformationModel;
use App\TagsModel;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostModel::all();
        return view('content.index',compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $tags = TagsModel::all();
            $categories = CategoriesModel::all();
            return view("content.create", compact("tags", "categories"));

            
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'title' => 'required|string|min:3',
            'author' => 'required|string|min:3',
        ]);

        $newPost = PostModel::create([
            "title" => $validated["title"],
            "author" => $validated["author"],
            "category_id" => $data["categories"]
        ]);


        $newPost->save();



        $postInfo = PostInformationModel::create([
            "post_id" => $newPost->id,
            "description" => $data["description"],
            "slug" => "prova_slug"
            
        ]);

        $postInfo->save();

        foreach ($data["tags"] as $tag) {
            $newPost->tags()->attach($tag);
        }

        return view('content.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts= PostModel::find($id);
        $detail = $posts->postInformation;
        $category = $posts->categories; 
        $tags = $posts->tags;
              
        return view("content.show", compact("detail","posts","category", "tags"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = PostModel::find($id);
        $tags = TagsModel::all();
        $categories = CategoriesModel::all();

        return view("content.edit", compact("posts", "tags", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts = PostModel::find($id);
        $data = $request->all();
        $posts->tags()->detach();
        $posts->update($data);

        $posts->postInformation->update($data);

        $posts->tags()->attach($data["tags"]);


        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PostModel::find($id);
        $post->postInformation->delete();
        
        foreach ($post->tags as $tag){
            
            $post->tags()->detach($tag->id);
        }
        
            $post->delete();
            return redirect()->back();
        
       /*  $post->delete(); */

        
    }
}
