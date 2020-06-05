<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title', 'English page')</title>
</head>
<style>
    .header-panel {
        background-color: blueviolet;
        color: white;
        display: flex;
        justify-content: space-between;
    }
</style>
<body>
    <div class="header-panel">
        <div>English page</div>
        <div>
            <a href="http://en.cms.tef/{{ request()->path() }}">En</a>
            /
            <a href="http://cms.tef/{{ request()->path() }}">Ru</a>
        </div>
    </div>
    <div>
        @yield('content')
    </div>
    </body>
</html>
