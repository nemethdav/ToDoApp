<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'ToDo') }}</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Work+Sans:300&subset=latin-ext');
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }
        body {
            background-image: url("{{ asset('storage/landing_hatter.jpg') }}");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            color: black;
            font-size: 36px;
            font-weight: bold;
            font-family: 'Work Sans';
        }
        .vizKozepre {
            position: absolute;
            left: 50%;
            transform: translate(-50%, 0);
            margin-right: -50%;
        }
        .teljesenKozepre {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            margin-right: -50%;
            text-align: center;
        }
        .lablec {
            bottom: 0;
            font-family: arial;
            font-size: 16px;
        }
        a {
            color:  white;
            text-decoration: none;
        }
        .gomb{
            font-family: arial;
            font-size: 16px;
            background-color: rgba(0, 0, 0, .5);
            padding: 10px 20px;
            width: 160px;
            font-weight: normal;
            display: inline-block;
        }

        /*Mobilbarát rész*/
        /*Ha a magasság 400px alatt van*/
        @media (max-height: 400px){
            .lablec {
                display: none;
            }
        }
    </style>

</head>
<body>

<div class="teljesenKozepre">
    To-Do App
    <div>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ route('todo.index') }}" class="gomb">
                        ToDo Listám
                    </a>
                @else
                    <a href="{{ route('login') }}" class="gomb">
                        Bejelentkezés
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="gomb">
                            Regisztráció
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</div>

<div class="vizKozepre lablec">
    &copy; Készítette: Németh Dávid - 2020<span id="year"></span>
</div>

</body>
</html>
