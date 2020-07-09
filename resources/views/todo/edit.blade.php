@extends('layouts.todo_layout')

@section('title', $todo->title . ' szerkesztése')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1 class="display-4 pb-4">{{ $todo->title }} szerkesztése</h1>

            <x-alert/>

            <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="text">ToDo címe:</label>
                    <input type="text" class="form-control form-control-lg" id="title" name="title"
                           placeholder="Nyári gyakorlat beadás"
                           value="{{ old('title') == null ? $todo->title : old('title') }}">
                </div>

                <div class="form-group">
                    <label for="description">ToDo részletesebb leírása</label>
                    <textarea class="form-control" id="description" name="description"
                              rows="3">{{ old('description') == null ? $todo->description : old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="deadline">Határidő: </label>
                    <input type="datetime-local" id="deadline" name="deadline" min="2010-01-01T00:00:00"
                           max="2022-06-30T00:00:00"
                           value="{{ old('deadline') == null ? $html_datetime_string : old('deadline')  }}" required>
                </div>

                <div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="reminder"
                               name="reminder" {{ (($todo->reminder == true) ? 'checked' : '') }}>
                        <label class="custom-control-label" for="reminder">Kér e-mail-es
                            emlékeztetőt?</label>
                    </div>
                </div>

                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox"
                           {{ ($todo->completed == true) ? 'checked' : '' }} id="completed" name="completed">
                    <label class="form-check-label" for="completed">
                        Feladat befejezve?
                    </label>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-outline-primary">Mentés</button>
                        <a href="{{ route('todo.index') }}">
                            <button type="button" class="btn btn-outline-danger"
                                    title="Visszalépéssel az adatok nem kerülnek mentésre!">Visszalépés
                            </button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
