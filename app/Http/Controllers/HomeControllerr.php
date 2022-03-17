<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\BlogPost;

class HomeController extends Controller
{
    //
    public function home(){
        // $blogPost = BlogPost::with('comments')->find(1);
        // $newComment = new \App\Comment(['content'=> 'new comment tste']);
        // $blogPost->comments()->save($newComment);
        // dd($blogPost->toArray());
        // $newComment2 = new \App\Comment(['content'=> 'new two comment tste']);
        // $blogPost->comments()->saveMany([$newComment,$newComment2]);
        // dd($blogPost->refresh()->toArray());
        // $blogPost=BlogPost::all();
        // $blogPost=BlogPost::has('comments','>=',3)->get();
        // $blogPost=BlogPost::whereHas('comments',function($query){
        //     $query->where('content','like','%ther');})->get();
        // $blogPost=BlogPost::wheredoesntHave('comments',function($query){
        //    $query->where('content','like','%ther');})->get();
           $blogPost=BlogPost::withCount(['comments','comments as new_comment'=>function($query){
            $query->where('created_at','>=','2022-03-11 09:43:08');}])->get();
        // $newComment = new \App\Comment(['content'=> 'neeta']);
        // $newComment = new \App\Comment(['blog_post_id'=> '1']);

        dd($blogPost->toArray());
        return view('welcome');
    }
    public function about(){
        return view('about');
    }
}
