@extends('admin.layout_'.Config::get('app.locale'))
@section('title', $model->title)

@section('content')
<h2>{{ $model->header }}</h2>
    {{ App\Blog::buildForm($model) }}
@endsection
