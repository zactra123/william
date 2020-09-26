<?php

namespace App\Console\Commands;
use App\User;
use Doctrine\DBAL\Driver\IBMDB2\DB2Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use Carbon\Carbon;

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
            ->leftJoin('credentials', 'users.id', '=', 'credentials.user_id')
            ->where('users.role', 'client')
            ->where('users.id', 39)
            ->where(function ($query) {
                $query->orWhereNUll([
                    'credentials.ck_login',
                    'credentials.ck_password',
                    'credentials.ex_login',
                    'credentials.ex_password',
                    'credentials.ex_answer',
                    'credentials.ex_pin',
                    'credentials.tu_login',
                    'credentials.tu_password',
                    'credentials.tu_answer',
                    'credentials.tu_question',
                    'credentials.eq_login',
                    'credentials.eq_password',
                ]);
            })
            ->select('users.*')
            ->get();

        foreach ($users as $user) {
            $start_time = Carbon::parse($user->created_at);
            $to_day = date('Y-m-d-H');
            $result = $start_time->diffInHours($to_day, false);


            if($user->note_count == 0) {
                if ($result > 24 && $result < 36) {
                    Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                        $mail->from('info@prudentscores.com');
                        $mail->to($user->email)
                            ->subject('Please add your credentials for start your working');
                    });
                    User::where('id', $user->id)->update(['note_count', 1]);
                }
            }elseif ($user->note_count == 1) {
                if ($result > 48 && $result < 60) {
                    Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                        $mail->from('info@prudentscores.com');
                        $mail->to($user->email)
                            ->subject('Please add your credentials for start your working');
                    });
                    User::where('id', $user->id)->update(['note_count', 2]);

                }
            }elseif ($user->note_count == 2) {
                if ($result > 72 && $result < 84) {
                    Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                        $mail->from('info@prudentscores.com');
                        $mail->to($user->email)
                            ->subject('Please add your credentials for start your working');
                    });
                    User::where('id', $user->id)->update(['note_count', 3]);

                }
            }elseif ($user->note_count == 3 && $result > 144) {
//                && $result < 168
                Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                    $mail->from('info@prudentscores.com');
                    $mail->to($user->email)
                        ->subject('Please add your credentials for start your working');
                });
                User::where('id', $user->id)->update(['active'=> 0]);


            }

            $this->info('Sent credentials notification to Clients');
        }
    }
}
