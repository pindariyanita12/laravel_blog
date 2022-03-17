<div class="form-group"><input type="text" name="title" class="form-control" value="{{old('title',optional($post ?? null)->title)}}"></div>
    <div class="form-group"><textarea name="content" id="" cols="30" rows="10" >{{old('content',optional($post ?? null)->content)}}</textarea></div>
    @if($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error )
                {{$error}}
            @endforeach
        </ul>
    </div>
    @endif
