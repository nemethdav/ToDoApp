@extends('layouts.todo_layout')

@section('title', 'ToDo címe - Szerkesztése')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1 class="display-4 pb-4">Új ToDo létrehozása</h1>

            <form action="{{ route('todo.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="text">ToDo címe:</label>
                    <input type="email" class="form-control form-control-lg" id="name" name="name"
                           placeholder="Nyári gyakorlat beadás">
                </div>

                <div class="form-group">
                    <label for="description">ToDo részletesebb leírása</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="deadline">Határidő: </label>
                    <input type="date" id="deadline" name="deadline">
                </div>

                <div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="emailWarn" name="emailWarn">
                        <label class="custom-control-label" for="emailWarn">Kér e-mail-es emlékeztetőt?</label>
                    </div>
                </div>

                <div class="form-group row">
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
