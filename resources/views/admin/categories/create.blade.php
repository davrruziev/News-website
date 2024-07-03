@extends('layouts.admin')

@section('content')

    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">

            <div class="card-header">
                <h4>HTML5 Form Basic</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name_uz</label>
                        <input type="text" name="name_uz" class="form-control  @error('name_uz') is-invalid @enderror">
                        @error('name_uz')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Name_ru</label>
                        <input type="text" name="name_ru" class="form-control @error('name_ru') is-invalid @enderror">
                        @error('name_ru')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="meta_description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control">
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
