<?php

namespace App\Services;
use App\User;

class Escrow
{
    private $ESCROW_URL = "https://api.escrow-sandbox.com/2017-09-01/";
    private $escrowEmailAddress = 'ararkelyan111@gmail.com';
    private $escrowPassword = 'Taxtak123';



    public function addClientEscrow($clientId)
    {
        $client = User::where('id', $clientId)->first();

        $fullAddress =  explode(',',$client->clientDetails->address);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->ESCROW_URL.'customer',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERPWD => $this->escrowEmailAddress.':'.$this->escrowPassword,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode(
                array(
                    'phone_number' => $client->clientDetails->phone_number,
                    'first_name' => $client->first_name,
                    'last_name' => $client->last_name,
                    'middle_name' => '',
                    'address' => array(
                        'city' => trim($fullAddress[1], " "),
                        'post_code' => $client->clientDetails->zip,
                        'country' => 'US',
                        'line2' => '',
                        'line1' => $fullAddress[0],
                        'state' => trim($fullAddress[2], " "),
                    ),
                    'email' => $client->email,
                )
            )
        ));

        $output = curl_exec($curl);
        curl_close($curl);

        // run only before create transaction

        dd($output);
    }

    public function createTransaction($clientId)
    {

        $client = User::where('id', $clientId)->first();
        $description = 'Credit repiar';
        $title = 'Credit Repiar';
        $amount = '10000';
        $inspectionPeriod = '2592000';
        $type = 'milestone';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->ESCROW_URL.'transaction',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERPWD => $this->escrowEmailAddress.':'.$this->escrowPassword,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode(
                array(
                    'currency' => 'usd',
                    'items' => array(
                        array(
                            'description' => $description,
                            'schedule' => array(
                                array(
                                    'payer_customer' => $client->email,
                                    'amount' => $amount,
                                    'beneficiary_customer' => 'me',
                                ),
                            ),
                            'title' => $title,
                            'inspection_period' => $inspectionPeriod,
                            'type' => $type,
                            'quantity' => '1',
                        ),

                    ),
                    'description' => '',
                    'parties' => array(
                        array(
                            'customer' => $client->email,
                            'role' => 'buyer',
                        ),
                        array(
                            'customer' => 'me',
                            'role' => 'seller',
                        ),
                    ),
                )
            )
        ));
        $output = curl_exec($curl);
        curl_close($curl);

        //create table transaction and save data for transaction and update him
        dd(json_decode($output));
    }







}
