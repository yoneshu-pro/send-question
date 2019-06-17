@extends('layout.base')

@section('body')
        <div class="card">
            <div class="card-header">プレゼン登録</div>
            <div class="card-body">
                <form method="post" action="{{ route('presents.store') }}" enctype="multipart/form-data">
                    @csrf

@if($errors->has('errorMessage'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('errorMessage') }}</div>
@endif
                    <div class="form-group">
                        <label for="title">プレゼン名</label>
@if($errors->has('title'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('title') }}</div>
@endif
                        <input type="text" id="title" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">プレゼン説明</label>
@if($errors->has('description'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('description') }}</div>
@endif
                        <textarea id="description" name="description" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile" class="d-block">プレゼン資料(PDF)</label>
@if($errors->has('pdf'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('pdf') }}</div>
@endif
                        <input type="file" id="exampleInputFile" class="d-block" name="pdf">
                    </div>
                    <button type="submit" class="btn btn-dark">登録する</button>
                </form>
            </div>
        </div>
@endsection
