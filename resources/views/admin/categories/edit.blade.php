@extends('layouts.admin')

@section('content')

    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">

            <div class="card-header">
                <h4>HTML5 Form Basic</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name_uz</label>
                        <input type="text" name="name_uz" value="{{ $category->name_uz }}" class="form-control  @error('name_uz') is-invalid @enderror">
                        @error('name_uz')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Name_ru</label>
                        <input type="text" name="name_ru" value="{{ $category->name_ru }}" class="form-control @error('name_ru') is-invalid @enderror">
                        @error('name_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="meta_description" value="{{ $category->meta_description }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Keywords</label>
                        <input type="text" name="meta_keywords" value="{{ $category->meta_keywords }}" class="form-control">
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
