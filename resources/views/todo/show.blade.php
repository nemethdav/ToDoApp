@extends('layouts.todo_layout')

@section('title', $todo->title . ' - ToDo megtekintése')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h1 class="display-4 pb-4">{{ $todo->title }} - ToDo részletei</h1>

            <div>
                <label class="font-weight-bold h4">{{ $todo->title }}</label>
            </div>

            <div>
                <label>{{ $todo->description }}</label>
            </div>

            <div>
                <label>ToDo határideje: <span class="font-weight-bold">{{ $todo->deadline }}</span></label>
                <div>
                    @if (!$todo->completed)
                        @if ($todo->deadline < date("Y-m-d H:i:s"))
                            <p class="text-danger font-weight-bold text-uppercase">A ToDo határideje lejárt!</p>
                        @elseif ($days == 0)
                            <p class="text-warning">A ToDo <b>kevesebb mint egy nap múlva</b> lesz esedékes!</p>
                        @elseif ($days < 3)
                            <p class="text-warning">A ToDo <b>{{ $days }} nap</b> múlva esedékes lesz!</p>
                        @else
                            <p class="text-info">A ToDo határideje {{ $days }} nap.</p>
                        @endif
                    @endif
                </div>
            </div>

            <div>
                <label>E-mail-es emlékezetőt <span
                        class="font-weight-bold text-uppercase">{{ ($todo->reminder) ? '' : 'nem' }}</span> kér a
                    határidő előtt</label>
                @if ($todo->reminder)
                    <label>Az emlékeztető küldésének napja: {{ $todo->reminder_date }}</label>
                @endif
            </div>

            <div>
                <label>A ToDo
                    <span class="font-weight-bold">
                        @if ($todo->completed == 0)
                            elvégzésre vár
                        @elseif ($todo->completed == 1)
                            elvégzése folyamatban
                        @else
                            elvégezve
                        @endif
                    </span>
                </label>
            </div>

            <div class="mt-3">
                <a href="{{ route('todo.index') }}">
                    <button type="button" class="btn btn-outline-info">Vissza a listához</button>
                </a>
            </div>
        </div>
    </div>

@endsection
