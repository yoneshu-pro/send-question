@extends('layout.base')

@section('body')
    <div class="container">
        <h1>{{ $present->title }}</h1>
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
    </div>
@endsection
