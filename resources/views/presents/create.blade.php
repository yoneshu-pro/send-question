@extends('layout.base')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header">プレゼン登録</div>
            <div class="card-body">
                <form method="post" action="{{ route('presents.store') }}" class="form-horizontal">
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
                    <button type="submit">登録する</button>
                </form>
            </div>
        </div>
    </div>
@endsection
