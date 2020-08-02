<?php

//php artisan queue:listen

namespace App\Console\Commands;

use App\Mail\ReminderEmail;
use App\ToDo;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to user about reminders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Get all reminder for today
        $todos = ToDo::query()
            ->with('user')
            ->where('completed', '0')
            ->where('completed', '1')
            ->where('reminder_date', now()->format('Y-m-d'))
            ->where('reminder', true)
            ->orderBy('user_id')
            ->get();

        //Group by user
        $data = [];
        foreach ($todos as $todo) {
            $data[$todo->user_id][] = $todo->toArray();
        }

//        dd($data);

        //Send Email
        foreach ($data as $userId => $reminders) {
            $this->sendEmailToUser($userId, $reminders);
        }

    }

    private function sendEmailToUser($userId, $reminders)
    {
        $user = User::findOrFail($userId);

        Mail::to($user)->send(new ReminderEmail($reminders));
    }
}
