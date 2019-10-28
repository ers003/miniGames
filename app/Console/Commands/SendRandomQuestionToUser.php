<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\questions;
use App\quiz_questions;
use App\users;

use App\Events\SendUserQuestion;

class SendRandomQuestionToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:question';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Random Question to Online Users';

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

        $onlineUsers = users::whereNotNull('last_login')->get();

        $cmdNewQuestions = [];

        foreach ($onlineUsers as $key => $user) {

            //check if this question is not repeated
            $oldQuestions = $user->answers->pluck('q_id')->toArray();

            $oldQuestions = array_merge($oldQuestions);

            if(!empty($oldQuestions)){
                $newQuestion = quiz_questions::whereNotIn('id', $oldQuestions)->first();
            } else {
                $newQuestion = quiz_questions::first();
            }

            if($newQuestion){
                $cmdNewQuestions[] = $newQuestion->id;
                event(new SendUserQuestion($user, $newQuestion));
            }
        }
    }
}
