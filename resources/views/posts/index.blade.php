@extends('layouts.app')
@section('title','Blog')
@section('content')
@if(count($posts))

    @foreach ($posts as $key=>$post)
    @include('posts.partials.post',[])
@if($post->comments_count)
<p>{{$post->comments_count}} comments</p>
@else
<p>No comments yet</p>
@endif
    @endforeach

    @else
    No found
    @endif


    {{-- alternative way --}}

    {{-- @forelse($postt as $key=>$pos)
    <div>{{$key}}.{{$pos['title']}}</div>
    @empty
    No found
    @endforelse --}}



     {{-- @foreach ($postt as $key=>$pos) --}}
    {{-- @if($loop->even)
    <div>{{$key}}.{{$pos['title']}}</div>



    @else
    <div style="background-color: pink">{{$key}}.{{$pos['title']}}</div> --}}
    {{-- //alternative way --}}
     {{-- @include('posts.partials.post') --}}
{{-- @endif --}}


{{-- alternative for foreach loop for partials --}}
{{-- @each('posts.partials.post',$postt,'pos') --}}




{{-- @endforeach --}}
@endsection
