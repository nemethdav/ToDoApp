<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\ToDo;
use Illuminate\Http\Request;
use DateTime;

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
        $todos = auth()->user()->todos()->orderBy('completed')->orderBy('deadline')->paginate(10);
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
        try {
            $deadline = $todo->deadline;
            $now = date("Y-m-d H:i:s");
            $datetime1 = new DateTime($deadline);
            $datetime2 = new DateTime($now);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            return view('todo.show', compact(['todo', 'days']));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Hiba a dátum meghatározásakor! Hiba:' . $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ToDo $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $todo)
    {
        define('HTML_DATETIME_LOCAL', "Y-m-d\TH:i");
        $php_timestamp = strtotime($todo->deadline);
        $html_datetime_string = date(HTML_DATETIME_LOCAL, $php_timestamp);

        return view('todo.edit', compact(['todo', 'html_datetime_string']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ToDo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoCreateRequest $request, ToDo $todo)
    {
        try {
            $reminder = ($request->reminder == 'on' ? true : false);
            $completed = ($request->completed == 'on' ? true : false);
            $todo->update([
                'title' => $request->title,
                'description' => $request->description,
                'completed' => $completed,
                'deadline' => $request->deadline,
                'reminder' => $reminder
            ]);
            return redirect(route('todo.index'))->with('message', 'ToDo sikeresen szerkesztve');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Hiba a ToDo szerkesztésekor!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ToDo $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $todo)
    {
        //
    }

    public function complete(ToDo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'ToDo megjelölve elvégzett feladatként!');
    }

    public function incomplete(ToDo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'ToDo megjelölve elvégzésre váró feladatként!');
    }
}
