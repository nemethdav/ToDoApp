@extends('layouts.todo_layout')

@section('title', 'ToDo címe')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h1 class="display-4 pb-4">ToDoNeve - ToDo részletei</h1>

            <div>
                <label class="font-weight-bold h4">ToDo címe</label>
            </div>

            <div>
                <label>ToDo leírása</label>
            </div>

            <div>
                <label>ToDo határideje: <span class="font-weight-bold">2020. 06. 30</span></label>
            </div>

            <div>
                <label>E-mail emlékezetőt <span class="font-weight-bold text-uppercase">igen</span> kér.</label>
            </div>
        </div>
    </div>
@endsection
