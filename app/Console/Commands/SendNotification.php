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
            ->where('users.id', 22)
            ->where('ck_login', null)
            ->orWhere('ck_password', null)
            ->orWhere('tu_login', null)
            ->orWhere('tu_password', null)
            ->orWhere('ex_login',null)
            ->orWhere('ex_password',null)
            ->orWhere('ex_answer',null)
            ->orWhere('ex_pin', null)
            ->orWhere('eq_login',null)
            ->orWhere('eq_password', null)
            ->where('users.role', 'client')

            ->select('users.*')
            ->toSql();

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
