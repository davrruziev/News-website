@extends('layouts.admin')
@section('title')
    Tags
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="card-header">
                    <h4>Tags</h4>
                    <div class="card-header-form">
                        <a href="{{ route('admin.tag.create') }}" class="btn btn-info">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name_uz</th>
                                <th>Name_ru</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tag->name_uz }}</td>
                                    <td>{{ $tag->name_ru }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>
                                        <a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('admin.tag.show', $tag->id) }}"
                                           class="btn btn-primary">View</a>
                                        <form style="display: inline"
                                              action="{{ route('admin.tag.destroy', $tag->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer text-right">
          <nav class="d-inline-block">
             {{ $categories->links() }}
          </nav>
        </div> --}}
            </div>
        </div>
    </div>
@endsection
