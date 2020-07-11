@extends('layouts.todo_layout')

@section('title', 'ToDo Listám')

@section('content')

    <h1 class="display-4 pb-4">ToDo Listám</h1>

    <x-alert/>

    <div class="form-row">
        <span class="d-flex justify-content-end col-12 mb-3">
            <input type="text" class="form-control col-3 search" id="search" onkeyup="search()"
                   placeholder="Keresés ToDo címe alapján...">
        </span>
    </div>

    <script>
        function search() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <table class="table table-striped" id="table">
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
                @if(!$todo->completed)
                    <th scope="row">{{ ($loop->index)+1 }}</th>
                @else
                    <th scope="row">-</th>
                @endif
                <td>
                    @include('todo.complete-button')
                </td>
                @if ($todo->completed)
                    <td>
                        <s>{{ $todo->title }}</s>
                    </td>
                @else
                    <td>
                        {{ $todo->title }}
                    </td>
                @endif
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
                        <span class="fas fa-calendar-times text-danger" onclick="
                            if(confirm('Biztosan törölni szeretné?')){
                            document.getElementById('delete{{ $todo->id }}').submit()
                            }
                            "/>

                        <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" style="display: none"
                              id={{ 'delete'.$todo->id }}>
                            @csrf
                            @method('DELETE')
                        </form>
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
