@component('mail::message')
    # ToDo határidő

    A következő ToDo-k hamarosan esedékesek lesznek:

    @component('mail::table')
        |Cím|Határidő|Hosszabb leírás|
        |:--|:--------|:--------------|
        @foreach($reminders as $reminder)
            |{{$reminder['title']}}|{{$reminder['deadline']}}|{{$reminder['description']}}
        @endforeach
    @endcomponent

    @component('mail::button', ['url' => 'http://127.0.0.1:8000/todo'])
        ToDo-k megtekintése
    @endcomponent

    {{ config('app.name') }}
@endcomponent
