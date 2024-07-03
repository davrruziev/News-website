@extends('layouts.admin')
@section('title')
    Posts
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Post ID -{{ $post->id }}</h4>
                    <div class="card-header-form">
                        <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">

                            <tr>
                                <th>ID</th>
                                <td>{{ $post->id }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $post->title_uz }}</td>
                            </tr>
                            <tr>
                                <th>Body_uz</th>
                                <td>{!! $post->body_uz !!}</td>
                            </tr>
                            <tr>
                                <th>Category</th><td>{{ $post->category->name_uz }}</td>
                            </tr>
                            <tr>
                                <th>Tags</th><td>@foreach ( $post->tags as $tag )
                                        {{ $tag->name_uz }},
                                    @endforeach</td>
                            </tr>
                            <tr>
                                <th>Image</th> <td><img src="/site/images/posts/{{ $post->img }}" width="150" alt="" srcset=""></td>
                            </tr>
                            <tr>
                                <th>Slug</th><td>{{ $post->slug }}</td>
                            </tr>
                            <tr>
                                <th>View</th><td>{{ $post->view }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
