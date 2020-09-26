<?php

use Illuminate\Database\Seeder;

class ProcessServersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('process_severs')->truncate();

        DB::table('process_severs')->insert([

            [
                'name'=>'VG LEGAL SERVICES',
                'address'=>'124 W STOCKER ST STE A',
                'city'=>'GLENDALE',
                'zip'=>'91202',
                'state'=>'CA',
                'email'=>'INFO@VGLEGALSERVICES.COM',
                'phone_number'=>null,
                'fax'=>null
            ],
            [
                'name'=>'TENACIOUS PROCESS SERVING',
                'address'=>'PO Box 210443',
                'city'=>'Royal Palm Beach',
                'zip'=>'33421',
                'state'=>'FL',
                'email'=>'TENACIOUSPROCESS@YAHOO.COM',
                'phone_number'=>'(561)798-5518',
                'fax'=>null
            ],
            [
                'name'=>'Rebecca Amensen',
                'address'=>'6549 Mission Gorge Road, #368',
                'city'=>'San Diego',
                'zip'=>'92120',
                'state'=>'CA',
                'email'=>'rebecca@stealthinvestigator.com',
                'phone_number'=>'(619)632-8787',
                'fax'=>null
            ],
            [
                'name'=>'PACIFIC COAST',
                'address'=>'695 N. 1ST ST #150',
                'city'=>'SAN JOSE',
                'zip'=>'95112',
                'state'=>'CA',
                'email'=>'pacificcoastlegal@gmail.com',
                'phone_number'=>'(408) 291-5000',
                'fax'=>null
            ],
            [
                'name'=>'OPTIMAL BUSINESS SOLUTIONS, LLC',
                'address'=>'1436 W GLENOAKS BLVD #176',
                'city'=>'GLENDALE',
                'zip'=>'91201',
                'state'=>'CA',
                'email'=>'INFO@OPTIMAL-BUSINESS-SOLUTIONS.COM',
                'phone_number'=>null,
                'fax'=>null
            ],
            [
                'name'=>'Naveen Dev',
                'address'=>'1035 Aster Avenue, # 2243',
                'city'=>'Sunnyvale',
                'zip'=>'94086',
                'state'=>'CA',
                'email'=>'nvdev4024@gmail.com',
                'phone_number'=>'(408) 687-1808',
                'fax'=>null
            ],
            [
                'name'=>'Kevin Dunn/Process Servers, LTD.',
                'address'=>'2500 Delaware Ave.',
                'city'=>'Wilmington',
                'zip'=>'19806',
                'state'=>'DE',
                'email'=>'(302)475-2600',
                'phone_number'=>'brandywineps@comcast.net',
                'fax'=>null
            ],
            [
                'name'=>'KD PROCESS',
                'address'=>'391 Prince Street',
                'city'=>'Tallahassee',
                'zip'=>null,
                'state'=>'FL',
                'email'=>'James@kdprocess.net',
                'phone_number'=>null,
                'fax'=>null
            ],
            [
                'name'=>'GSI ATTN: David J HOWELL',
                'address'=>'360 E. First Street, Ste. 773',
                'city'=>'Tustin',
                'zip'=>'92780',
                'state'=>'CA',
                'email'=>'(714)486-3606',
                'phone_number'=>'gsilegal@aol.com',
                'fax'=>null
            ],
            [
                'name'=>'DUE PROCESS',
                'address'=>'390 West Delavan Avenue',
                'city'=>'BUFFALO',
                'zip'=>'14213',
                'state'=>'NY',
                'email'=>'service@dueprocessbuffalo.com',
                'phone_number'=>'(716) 348-8628',
                'fax'=>null
            ],
            [
                'name'=>'Cross Courier Attn: Danielle R. Sowell',
                'address'=>'1029 Hwy 6 N., Ste. 650',
                'city'=>'Houston',
                'zip'=>'77079',
                'state'=>'TX',
                'email'=>'danielle@crosscourier.com',
                'phone_number'=>'(281) 381-1189',
                'fax'=> '(281) 860-2532'
            ],
            [
                'name'=>'Courthouse Courier',
                'address'=>'1032 S. 2nd Street',
                'city'=>'SPRINGFIELD',
                'zip'=>'62704',
                'state'=>'IL',
                'email'=>'(217) 528-5997',
                'phone_number'=>'servemanager@courthousecourier.org',
                'fax'=>null
            ],
            [
                'name'=>'CARLA ELLIS',
                'address'=>'646 South 9th Street',
                'city'=>'Lindenhurst',
                'zip'=>'11757',
                'state'=>'NY',
                'email'=>'info@cmeprocessservice.com',
                'phone_number'=>'(516) 524-9018',
                'fax'=>null
            ],
            [
                'name'=>'Baxley Process Serving',
                'address'=>'4240 Migration Dr. #1',
                'city'=>'JACKSONVILLE',
                'zip'=>'32257',
                'state'=>'FL',
                'email'=>'habaxley@gmail.com',
                'phone_number'=>'(904)404-4941',
                'fax'=>null
            ],
            [
                'name'=>'Attorney Services of Merced',
                'address'=>'833 W. 22nd Street',
                'city'=>'Merced',
                'zip'=>'95340',
                'state'=>'CA',
                'email'=>'office@82lsn.com',
                'phone_number'=>'(209)383-3233',
                'fax'=>null
            ],
            [
                'name'=>'Anderson Investigations, Inc.',
                'address'=>'230 West 200 South #2302 ',
                'city'=>'Salt Lake City',
                'zip'=>'84101',
                'state'=>'UT',
                'email'=>null,
                'phone_number'=>'(801)619-1110',
                'fax'=>null
            ],
            [
                'name'=>'Affordable Legal Services ATTN: Mike Hylan',
                'address'=>'664-A FREEMAN LN STE 194',
                'city'=>'GRASS VALLEY',
                'zip'=>'95945',
                'state'=>'CA',
                'email'=>'process@als-nc.com',
                'phone_number'=>'(530) 272-5463',
                'fax'=>null
            ],


        ]);

    }
}
