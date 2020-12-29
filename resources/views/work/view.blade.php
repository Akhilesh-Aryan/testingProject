@extends('work.base')
@section('title')
This is | homepage
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-9 mx-auto">
                <div class="card mt-3 ">
                    <div class="card-body pt-1 p-0">
                        <div class="col-lg-3 float-left">
                            <a href="#" class=""><img src="{{ asset('images/'.$value->image) }}"
                                    class="card-img-top" height="200px" alt="this is image"></a>
                        </div>
                        <div class="col-lg-9 float-left">
                            <h3>{{ $value->title }}</h3>
                            <small>Auther- {{ $value->author }}</small>
                            <p class="lead">{{ $value->body }}</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
