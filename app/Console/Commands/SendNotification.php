<?php

namespace App\Console\Commands;
use App\User;
use Doctrine\DBAL\Driver\IBMDB2\DB2Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'credential:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification email credentials';

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
        $words = [
            'aberration' => 'a state or condition markedly different from the norm',
            'convivial' => 'occupied with or fond of the pleasures of good company',
            'diaphanous' => 'so thin as to transmit light',
            'elegy' => 'a mournful poem; a lament for the dead',
            'ostensible' => 'appearing as such but not necessarily so'
        ];

        // Finding a random word
        $key = array_rand($words);
        $value = $words[$key];

        $users = DB::table('users')

            ->leftJoin('credentials', 'users.id','=', 'credentials.user_id')
            ->where('users.role', 'client')
            ->where(DB::raw('ck_login IS NULL OR ck_password IS NULL'))

//            ->where(DB::raw('ck_login IS NULL OR ck_password IS NULL OR tu_login IS NULL OR tu_password IS NULL
//            OR ex_login IS NULL OR ex_password IS NULL OR ex_answer IS NULL OR ex_pin IS NULL OR eq_login IS NULL
//            OR eq_password IS NULL'))

            ->select('users.*')
            ->get();

        dd($users);



        foreach ($users as $user) {

            Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                $mail->from('info@prudentcredit.com');
                $mail->to($user->email)
                    ->subject('Please add your credentials for start your working');
            });
        }

        $this->info('Sent credentials notification to Clients');
    }
}
