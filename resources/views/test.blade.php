<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <form method="post" action="{{url('test/1')}}">
                         {!! csrf_field() !!}
                        <input type="text" name="name" value="">
                        <input type="submit" name="submit">
                    </form>
                </div>
{{ $val }}

@foreach($all_news as $news)

 <h2> {{ $news->name }} </h2>

{!! $all_news->render() !!} <!-- pagination -->

<form method="post" action="{{ url('insert/news') }}">
    {!! csrf_field() !!}


    <input type="text" name="name" value="">
    <input type="submit" name="submit">

</form>
<form method="post" action="{{ url('delete/news/'.$news->id) }}">
    {!! csrf_field() !!}


    <input type="hidden" name="_method" value="DELETE">
    <input type="checkbox" name="id[]" value="{{ $news->id }}"> <!-- for multi delete -->
    <input type="submit" name="full_delete" value="delete">

    <input type="submit" name="soft_delete" value="soft delete">


</form>

@endforeach
@foreach($soft_deletes as $news)

 <h2> {{ $news->name }} </h2>
{!! $all_news->render() !!} <!-- pagination -->


<form method="post" action="{{ url('delete/news/'.$news->id) }}">
    {!! csrf_field() !!}
<input type="text" name="name" value="{{old('name')}}">
<input type="text" name="title" value="{{old('title')}}">

    <input type="hidden" name="_method" value="DELETE">
    <input type="checkbox" name="id[]" value="{{ $news->id }}"> <!-- for multi delete -->
    <input type="submit" name="force_delete" value="force_delete">

    <input type="submit" name="restore" value="restore">
{{ !empty($news->delete_at){ "trashed"; } }} <!-- if soft deleted -->

</form>
<!-- errors -->
     @if($errors->all() as $error)
       <li>   {{ $error }} </li>
     @endif

     <!-- session -->
     @if(session()->has('message'))
        {{ session()->get('message') }}
        {{ session()->get('message')[0]['key1'] }}
     @endif




@endforeach            <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
