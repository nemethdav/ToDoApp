<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = auth()->user()->todos()->orderBy('completed')->paginate(10);
        return view('todo.index', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(TodoCreateRequest $request)
//    public function store(Request $request)
    {
        $reminder = ($request->reminder == 'on' ? true : false);
        auth()->user()->todos()->create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'reminder' => $reminder
        ]);
        return redirect(route('todo.index'))->with('message', 'ToDo sikeresen elmentve!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ToDo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(ToDo $todo)
    {
        dd($todo);
        return view('todo.show', compact('toDo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ToDo $toDo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $todo)
    {
        dd($todo);
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ToDo $toDo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDo $toDo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ToDo $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $toDo)
    {
        //
    }
}
