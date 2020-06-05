@extends('layout_'.Config::get('app.locale'))
@section('title', $model->title)

@section('content')
<h2>{{ $model->header }}</h2>
    @foreach ($model->children as $childModel)
        <div>
            <a href="/blogs/{{ $childModel->id }}">{{ $childModel->title }}</a>
        </div>
    @endforeach
@endsection
