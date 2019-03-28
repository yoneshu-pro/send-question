@extends('layout.base')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header">プレゼン検索</div>
            <div class="card-body">
                <form method="get" action={{ route('presents.index') }} class="form-horizontal">
                    <div class="form-group">
                        <label for="present">プレゼン名</label>
                        <input type="text" id="present" name="search" class="form-control">
                    </div>
                    <button type="submit">検索する</button>
                </form>
            </div>
        </div>
@if(count($presents) !== 0)
        <div class="card mt-3">
            <div class="card-header">プレゼン一覧</div>
            <div class="card-body">
@foreach($presents as $present)
                <div class="card mb-3">
                    <a href="{{ route('presents.show', ['id' => $present->id]) }}"><div class="card-body">{{ $present->title }}</div></a>
                </div>
@endforeach
            </div>
        </div>
@endif
    </div>
@endsection
