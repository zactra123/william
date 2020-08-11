<?php

namespace App\Services;
use App\User;

class Screaper
{
    public function transunion_dispute($client_id = null, $arguments = [])
    {
//        if ($client_id) {
//            $cilient = User::find($client_id);
//            $username = $client->credentials
//            $password =
//        }
        array_push($arguments, $client_id);
        $command = $this->make_run_command('transunion_dispute.py',$arguments);
        $output = shell_exec($command);
        dd($output);
    }

    public function trnsunion_membership($client_id = null, $arguments = [])
    {
        array_push($arguments, $client_id);
        $command = $this->make_run_command('transunion_payment_status.py',$arguments);
        $output = shell_exec($command);
        dd($output);
    }

    public function experian_login($client_id = null, $arguments = [])
    {
        array_push($arguments, $client_id);
        $command = $this->make_run_command('experian_login.py',$arguments);
//        dd($command);
        $output = shell_exec($command);
        dd($output);
    }

    public function experian_view_report($client_id = null, $arguments = [])
    {
        array_push($arguments, $client_id);
        $command = $this->make_run_command('experian_view_report.py',$arguments);
//        dd($command);
        $output = shell_exec($command);
        dd($output);
    }


    private function make_run_command($script_name, $command_args)
    {
        $script_path = resource_path('scripts/'. $script_name);
        $command_args = array_merge(['python3', $script_path], $command_args);
        $command = escapeshellcmd(implode( " ", $command_args));
        return $command;
    }
}
