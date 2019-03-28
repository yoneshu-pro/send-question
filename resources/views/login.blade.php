@extends('layout.base')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header">ログイン</div>
            <div class="card-body">
                <form method="post" action={{ route('login') }} class="form-horizontal">
                    @csrf
@if($errors->has('errorMessage'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('errorMessage') }}</div>
@endif
                    <div class="form-group">
                        <label for="password">password</label>
@if($errors->has('password'))
                            <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
@endif
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <button type="submit">ログイン</button>
                </form>
            </div>
        </div>
    </div>
@endsection
