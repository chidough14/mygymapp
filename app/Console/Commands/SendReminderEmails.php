<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;

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
        //Get all reminders for today

        $reminders = Reminder::query()->with(['lead'])
                    ->where('reminders.reminder_date', now()->format('Y-m-d'))
                    ->where('reminders.status', 'pending')
                    ->orderBy('user_id')
                    ->get();

        //Group them by user
        $data = [];
        foreach($reminders as $reminder) {
            $data[$reminder->user_id][] = $reminder->toArray();
        }

        dd($data);

        //send email

    }
}
