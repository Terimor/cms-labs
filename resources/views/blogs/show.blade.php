@extends('layout_'.Config::get('app.locale'))
@section('title', $model->title)

@section('content')
<h2>{{ $model->header }}</h2>
<div>{{ $model->content }}</div>
@endsection
