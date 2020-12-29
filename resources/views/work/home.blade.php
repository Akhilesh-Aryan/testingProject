@extends('work.base')
@section('title')
This is | homepage
@endsection
@section('content')

<div class="container">
    <div class="row mt-2">
        <div class="col-lg-9 mx-auto">
            @if(session('msg'))
        {!!session('msg')!!}
            @endif
            @foreach($data as $value)
                <div class="card mt-2 shadow-sm">
                    <div class="card-body pt-1 p-0">
                        <div class="col-lg-3 float-left">
                            <a href="#" class=""><img src="{{ asset('images/'.$value->image) }}"
                                    class="card-img-top" height="200px" alt="this is image"></a>
                        </div>
                        <div class="col-lg-9 float-left">
                            <h3>{{ $value->title }}</h3>
                            <small>{{ $value->author }}</small>
                            <p class="lead">{{ $value->body }}</p>
                            <div class="btn-group float-right">
                                <a href="{{route("post.show",["post"=>$value->id])}}" class="btn btn-sm btn-outline-info rounded mr-2">Read more..</a>
                                <a href="{{route("post.edit",['post'=>$value->id])}}" class="btn btn-sm btn-outline-success mr-2 rounded">Edit</a>
                                <form
                                    action="{{ route('post.destroy',["post"=>$value->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-sm btn-outline-danger" name="delete"
                                        value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
