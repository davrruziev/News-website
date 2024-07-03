@extends('layouts.admin')

@section('content')

    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">

            <div class="card-header">
                <h4>Category ID {{ $category->id }}</h4>
                <div class="card-header-form">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th>Name Uz</th>
                            <td>{{ $category->name_uz }}</td>
                        </tr>
                        <tr>
                            <th>Name Ru</th>  <td>{{ $category->name_ru }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>  <td>{{ $category->slug }}</td>
                        </tr>
                        <tr>
                            <th>Meta Title</th>  <td>{{ $category->meta_title }}</td>
                        </tr>
                        <tr>
                            <th>Mate Description</th>  <td>{{ $category->meta_description }}</td>
                        </tr>
                        <tr>
                            <th>Meta Keywords</th>  <td>{{ $category->meta_keywords }}</td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection
