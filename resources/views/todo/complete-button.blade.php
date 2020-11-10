@if($todo->completed == '0')
    <span class="fas fa-exclamation text-danger pointer-cursor"
          onclick="document.getElementById('{{$todo->id}}-complete')
              .submit()"
          title="Megjelölés folyamatban lévő feldatként"> - Elvégzendő feladat</span>
    <form action="{{ route('todo.inProgress', $todo->id) }}" method="POST" style="display: none"
          id="{{ $todo->id.'-complete' }}">
{{--        @csrf--}}
        @method('PATCH')
    </form>
@elseif ($todo->completed == '1')
    <span class="fas fa-spinner text-primary pointer-cursor"
          onclick="document.getElementById('{{$todo->id}}-complete')
              .submit()"
          title="Megjelölés elvégzett feladatként"> - Folyamatban lévő feladat</span>
    <form action="{{ route('todo.complete', $todo->id) }}" method="POST" style="display: none"
          id="{{ $todo->id.'-complete' }}">
{{--        @csrf--}}
        @method('PATCH')
    </form>
@else
    <span class="fas fa-check text-success pointer-cursor"
          onclick="document.getElementById('{{$todo->id}}-complete')
              .submit()"
          title="Megjelölés elvégezetlen feladatként"> - Elvégzett feladat</span>
    <form action="{{ route('todo.incomplete', $todo->id) }}" method="POST" style="display: none"
          id="{{ $todo->id.'-complete' }}">
{{--        @csrf--}}
        @method('PATCH')
    </form>
@endif
