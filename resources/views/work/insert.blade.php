@extends('work.base')
@section('title')
This is | Insertpage
@endsection
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="lead text-center">CREATE YOUR POST HERE-</h4>
                        <hr>
                        <form action="{{route('post.store')}}" method="Post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                @error('title')
                                    <span class="text-danger small">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" name="author" value="{{old('author')}}">
                                @error('author')
                                    <span class="text-danger small">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" value="">
                                @error('image')
                                    <span class="text-danger small">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="body">Body</label>
                              <textarea rows="6" class="form-control" name="body">{{old('body')}}</textarea>
                                @error('body')
                                    <span class="text-danger small">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="form-control btn btn-info btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
