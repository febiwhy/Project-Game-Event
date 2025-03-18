<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendaftaran')->insert([
            'nama'         => 'Febi Wahyu',
            'email'        => 'febi@gmail.com',
            'id_number'     => '0123456789',
            'whatsapp'     => '0123456789',
            'alamat'       => 'Semarang',
        ]);
    }
}
