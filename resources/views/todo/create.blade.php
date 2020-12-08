@extends('layouts.todo_layout')

@section('title', 'Új ToDo létrehozása')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1 class="display-4 pb-4">Új ToDo létrehozása</h1>

            <x-alert/>

            <form action="{{ route('todo.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">ToDo címe:</label>
                    <input type="text" class="form-control form-control-lg" id="title" name="title" min="3" max="255"
                           required
                           placeholder="Témalabor beadás határidő" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="description">ToDo részletesebb leírása</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required minlength="10"
                              maxlength="65535">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="deadline">Határidő: </label>
                    <input type="datetime-local" id="deadline" name="deadline"
                           value="{{ old('deadline') }}" required>
                </div>

                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="reminder"
                           name="reminder" {{ old('reminder')=='on'? 'checked' : ''  }}>
                    <label class="custom-control-label" for="reminder">Kér e-mail-es emlékeztetőt?</label>
                </div>

                @if (old('reminder') == 'on')
                    <div class="form-group" id="dateDiv">
                        <label for="reminder_date">E-mail-es emlékeztető napja: </label>
                        <input type="date" id="reminder_date" name="reminder_date"
                               value="{{ old('reminder_date') }}">
                    </div>
                @endif

                <div class="form-group" id="dateDiv" style="display: none">
                    <label for="reminder_date">E-mail-es emlékeztető napja: </label>
                    <input type="date" id="reminder_date" name="reminder_date"
                           value="{{ old('reminder_date') }}">
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-outline-primary mt-2">Mentés</button>
                    <a href="{{ route('todo.index') }}">
                        <button type="button" class="btn btn-outline-danger mt-2 ml-2"
                                title="Visszalépéssel az adatok nem kerülnek mentésre!">Visszalépés
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- JS files -->
    <script type="text/javascript" src="{{ asset('js/datetime.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/hideShow.js') }}" defer></script>

@endsection
