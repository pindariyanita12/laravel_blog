@extends('layouts.app')
@section('title',$post['title'])
@section('content')
{{-- @if($postt['is_new']) --}}
{{-- <div>This is new post</div> --}}
{{-- @elseif(!$postt['is_new']) --}}
{{-- // @else will also ok --}}
{{-- <div>This is old post</div> --}}
{{-- @endif --}}
{{-- @unless($postt['is_new']) --}}
{{-- <div>This is old using unless</div> --}}
{{-- @endunless --}}
{{-- @isset($postt['is_comments']) --}}
{{-- <div>This post have comments</div> --}}
{{-- @endisset --}}
<h1>{{$post['title']}}</h1>
<p>{{$post['content']}}</p>
@endsection
