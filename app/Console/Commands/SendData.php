<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\users;

class SendData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:data {--delay= : 30}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send data to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(users $user)
    {
        parent::__construct();
        $this->users = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'https://opentdb.com/api.php?amount=10&type=multiple';

          $client = new \GuzzleHttp\Client();

          $request = $client->request('GET', $url);
        
         $body = $request->getBody();

         var_dump($body);
         $data = json_decode($body, true);
         foreach($data['results'] as $i => $el){
             DB::table('quiz_questions')->insert(
                 ['question' =>  $el['question'], 
                 'correct_answer' => $el['correct_answer'], 
                 'incorrect_1' => $el['incorrect_answers'][0],
                 'incorrect_2' => $el['incorrect_answers'][1],
                 'incorrect_3' => $el['incorrect_answers'][2],
                 'difficulty' => $el['difficulty'],
                 'category' => $el['category'],
                 ]
             );
         }
         sleep(intval($this->option('delay')));
    }
}
