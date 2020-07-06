@if($todo->completed)
    <span class="fas fa-check text-success pointer-cursor"
          onclick="document.getElementById('{{$todo->id}}-complete')
              .submit()"
          title="Megjelölés elvégezetlen feladatként"> - Elvégzett feladat</span>
    <form action="{{ route('todo.incomplete', $todo->id) }}" method="POST" style="display: none"
          id="{{ $todo->id.'-complete' }}">
        @csrf
        @method('PATCH')
    </form>
@else
    <span class="fas fa-check text-warning pointer-cursor"
          onclick="document.getElementById('{{$todo->id}}-complete')
              .submit()"
          title="Megjelölés elvégzett feladatként"> - Elvégzendő feladat</span>
    <form action="{{ route('todo.complete', $todo->id) }}" method="POST" style="display: none"
          id="{{ $todo->id.'-complete' }}">
        @csrf
        @method('PATCH')
    </form>
@endif
