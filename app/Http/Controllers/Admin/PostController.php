<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    
    protected $validationRules =[
        'title' => ['required', 'unique:posts'],
        'post_date' => 'required',
        'content' => 'required',
        'image' => 'required|image',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', ["post"=>new Post()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate($this->validationRules);

        $data['author'] = Auth::user()->name;
        $data['slug'] = Str::slug($data ['title']) ;
        $data['image'] =Storage::put('storage',$data['image']);

        $newPost = new Post();
        $newPost ->fill($data);
        $newPost->save();

        return redirect()->route('admin.posts.index')->with('message', "The post has created");
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post the current post 
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post )
    {
        $data= $request->validate([
                'title' => ['required', Rule::unique('posts')->ignore($post->id)],
                'post_date' => 'required|after:yesterday',
                'content' => 'required',
                'image'=> 'image|required',
        ]);
        $post->update($data);
        return redirect()->route('admin.posts.show', compact('post'));

        if($request->hasFile('image')){
            if (!$post->isImageUrl()){
                Storage::delete($post->image);
            }

            $data['image'] =Storage::put('storage',$data['image']);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (!$post->isImageUrl()){
            Storage::delete($post->image);
        }
        $post->delete();
        return redirect()->route('admin.posts.index') ->with('message', "The post $post->title has been deleted")->with('message-class','warning');
    }
}
