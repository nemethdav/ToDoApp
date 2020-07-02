@extends('layouts.todo_layout')

@section('title', 'ToDo Listám')

@section('content')

    <h1 class="display-4 pb-4">ToDo Listám</h1>

    <x-alert/>

    <table class="table table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">Sorszám</th>
            <th scope="col">Kész</th>
            <th scope="col">Név</th>
            <th scope="col">Határidő</th>
            <th scope="col">Műveletek</th>
        </tr>
        </thead>
        <tbody>

        @forelse($todos as $todo)
            <tr class="text-center">
                <th scope="row">{{ ($loop->index)+1 }}</th>
                <td><i class="fas fa-check text-black-50"/> - Kész/Nincs kész</td>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->deadline }}</td>
                <td class="d-flex justify-content-center">

                    <div class="mr-3 text-info">
                        <a href="{{ route('todo.show', $todo->id) }}">
                            <span class="fas fa-eye text-info" title="ToDo részletei"/>
                        </a>
                    </div>

                    <div class="mr-3 text-warning">
                        <a href="{{ route('todo.edit', $todo->id) }}">
                            <span class="far fa-edit text-warning" title="ToDo szerkesztése"/>
                        </a>
                    </div>
                    <div class="mr-3 text-danger pointer-cursor">
                        <span class="fas fa-calendar-times text-danger"/>

                    </div>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    Még egyetlen ToDo-ja sincs! <a href="{{ route('todo.create') }}">Hozzon létre egyet itt!</a>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
            {{ $todos->links() }}
        </div>
    </div>
@endsection
