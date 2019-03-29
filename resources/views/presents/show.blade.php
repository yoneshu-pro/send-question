@extends('layout.base')

@section('body')
        <h1>{{ $present->title }}</h1>
        <div id="slide" class="carousel slide mb-3" data-ride="carousel" data-keyboard="true" data-interval="0" data-wrap="false">
            <ol class="carousel-indicators">
@for($i = 0; $i < $present->max_slide_page; $i++)
                <li data-target="#slide" data-slide-to="{{$i}}" @if($i === 0)class="active"@endif></li>
@endfor
            </ol>
            <!-- スライドさせる画像の設定 -->
            <div class="carousel-inner">
@for($i = 1; $i <= $present->max_slide_page; $i++)
                <div class="carousel-item @if($i === 1)active @endif">
                    <img src="{{ asset('pdf/' . $id . '/' . $i . '.jpg') }}" class="img-fluid">
                </div>
@endfor
            </div>
            <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev"></a>
            <a class="carousel-control-next" href="#slide" role="button" data-slide="next"></a>
        </div>
        <div class="card mb-3">
            <div class="card-header">質問登録</div>
            <div class="card-body">
                <form method="post" action={{ route('questions.store') }} class="form-horizontal">
                    @csrf

                    <input type="hidden" name="present_id" value="{{ $id }}">
                    <div class="form-group">
                        <label for="question">質問内容</label>
                        <textarea id="question" name="question" class="form-control rounded-0" rows="5"></textarea>
                    </div>
                    <button type="submit">登録する</button>
                </form>
            </div>
        </div>
@if($present->questions->count() !== 0)
        <div class="card">
            <div class="card-header">質問一覧</div>
            <div class="card-body">
@foreach($present->questions as $question)
                <div class="card mb-3">
                    <div class="card-body">{{ $question->question }}</div>
                </div>
@endforeach
            </div>
        </div>
@endif
@endsection
