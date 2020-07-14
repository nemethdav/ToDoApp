<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class ToDo extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\ToDo::count();
        $string = 'ToDos';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-list-add',
            'title' => "{$count} {$string}",
            'text' => 'You have ' . $count . ' ToDos in your database. Click on button below to view all users.',
            'button' => [
                'text' => 'View all ToDos',
                'link' => route('voyager.to-dos.index'),
            ],
            'image' => asset('/storage/todoWidget.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
