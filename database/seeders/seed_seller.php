<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mod_sellers;

class seed_seller extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        mod_sellers::truncate();
        mod_sellers::create([
            'email' => 'erkhes.frog@gmail.com',
            'password' => md5('0000'),
            'type' => 'seller'
        ]);
    }
}
