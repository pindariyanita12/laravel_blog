<?php

namespace App\Http\Controllers;
use App\Http\Requests\Storepost;
use Illuminate\Http\Request;
use App\BlogPost;
use DB;
class PostControllerr extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('posts.index',['posts'=>Blogpost::withCount('comments')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepost $request)
    {
        //
        $validated=$request->validated();
        // $post=new Blogpost();
        // $post->title=$validated['title'];
        // $post->content=$validated['content'];
        // $post->save();
        $post=BlogPost::create($validated);
        $request->session()->flash('status','Successfully created');
        return redirect()->route('posts.show',['post'=>$post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //abort_if(!isset($this->posts[$id]),404);
         return view('posts.show',['post'=>Blogpost::findorFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('posts.edit',['post'=>Blogpost::findorFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Storepost $request, $id)
    {
        //
        $post=BlogPost::findOrFail($id);
        $validated=$request->validated();
        $post->fill($validated);
        $post->save();
        $request->session()->flash('status','Successfully updated');
        return redirect()->route('posts.show',['post'=>$post->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post=BlogPost::findorFail($id);
        $post->delete();
        session()->flash('status','Successfully deleted');
        return redirect()->route('posts.index');

    }
}
