@extends('layout.base')

@section('body')
        <div class="card my-3">
            <div class="card-header">プレゼン検索</div>
            <div class="card-body">
                <form method="get" action={{ route('presents.index') }} class="form-horizontal">
                    <div class="form-group">
                        <label for="present">プレゼン名</label>
                        <input type="text" id="present" name="search" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-dark">検索する</button>
                </form>
            </div>
        </div>
        <div class="row mt-sm-3">
@foreach($presents as $present)
            <div class="col-sm-3 mb-3">
                <div class="card">
                    <img class="card-img" src="/pdf/{{ $present->id }}/1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $present->title }}</h5>
                        <p class="card-text">{{ $present->description }}</p>
                        <a href="{{ route('presents.show', ['id' => $present->id]) }}" class="btn btn-secondary">プレゼンを見る</a>
                    </div>
                </div>
            </div>
@endforeach
        </div>
@endsection
