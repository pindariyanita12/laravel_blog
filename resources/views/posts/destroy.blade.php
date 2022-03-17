@if($loop->even)
<div>{{$key}}.{{$post->title}}</div>



@else
<div style="background-color: pink">{{$key}}.{{$post->title}}</div>
@endif

<div>
<form action="{{route('posts.destroy',['post'=>$post->id])}}" method="post">
@csrf
@method('DELETE')
<input type="submit" value="Delete">
</form>
</div>
