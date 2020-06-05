@extends('admin.layout_'.Config::get('app.locale'))
@section('title', $model->title)

@section('content')
<h2>{{ $model->header }}</h2>
    @foreach ($model->children as $childModel)
        <div>
            <a href="/blogs/{{ $childModel->id }}">{{ $childModel->title }}</a>
            <a href="/admin/blogs/edit/{{ $childModel->id }}">Edit</a>
            <a href="/admin/blogs/delete/{{ $childModel->id }}">Delete</a>
        </div>
    @endforeach
    <a href="/admin/blogs/edit">Add</a>
@endsection
