@extends('layouts.todo_layout')

@section('title', 'ToDo Listám')

@section('content')

    <h1 class="display-4 pb-4">ToDo Listám</h1>

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
        <tr class="text-center">
            <th scope="row">1</th>
            <td><i class="fas fa-check text-black-50"/> - Kész/Nincs kész</td>
            <td>New Todo</td>
            <td>2020-06-30</td>
            <td class="d-flex justify-content-center">
                <div class="mr-3 text-info">
                    <a href="{{ route('todo.show', 1) }} }}"><span class="fas fa-eye text-info" title="ToDo részletei"/></a>
                </div>
                <div class="mr-3 text-warning">
                    <a href="{{ route('todo.edit', 1) }}"><span class="far fa-edit text-warning"
                                                                title="ToDo szerkesztése"/>
                </div>
                <div class="mr-3 text-danger">
                    <span class="fas fa-calendar-times text-danger" title="ToDo törlése"/>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

@endsection
