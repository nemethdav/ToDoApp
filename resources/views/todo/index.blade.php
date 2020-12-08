@extends('layouts.todo_layout')

@section('title', 'ToDo Listám')

@section('content')

    <h1 class="display-4 pb-4">ToDo Listám</h1>

    <x-alert/>

{{--    <div class="breakpoints">--}}
{{--        <div class="d-block d-sm-none">XS</div>--}}
{{--        <!--d-block: display block; d-none: display-none; melyiknél jelenjen meg és melyiknél nem, a kicsi felől a nagy felé-->--}}
{{--        <div class="d-none d-sm-block d-md-none">SM</div>--}}
{{--        <div class="d-none d-md-block d-lg-none">MD</div>--}}
{{--        <div class="d-none d-lg-block d-xl-none">LG</div>--}}
{{--        <div class="d-none d-xl-block">XL</div>--}}
{{--    </div>--}}

    <div class="form-row">
        <span class="d-flex justify-content-end col-12 mb-3">
            <input type="text" class="form-control col-xs-6 col-md-3 search" id="search" placeholder="Keresés ToDo címe alapján...">
        </span>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sortable" id="table">
            <thead>
            <tr class="text-center">
                <th scope="col">Sorszám</th>
                <th scope="col">Állapot</th>
                <th scope="col">Cím</th>
                <th scope="col">Határidő</th>
                <th scope="col">Műveletek</th>
            </tr>
            </thead>
            <tbody>

            @forelse($todos as $todo)
                <tr class="text-center">
                    @if($todo->completed == 0 || $todo->completed == 1)
                        <th scope="row">{{ ($loop->index)+1 }}</th>
                    @else
                        <th scope="row">-</th>
                    @endif
                    <td>
                        @include('todo.complete-button')
                    </td>
                    @if ($todo->completed == 2)
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
    </div>
    <div class="row">
        <div class="mx-auto">
            {{ $todos->links() }}
        </div>
    </div>

    <!-- JS files -->
    <script type="text/javascript" src="{{ asset('js/sort.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/search.js') }}" defer></script>

@endsection
