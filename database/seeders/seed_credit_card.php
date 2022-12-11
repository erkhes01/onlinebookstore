<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mod_credit_cards;

class seed_credit_card extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mod_credit_cards::truncate();
        mod_credit_cards::create([
            'email' => 'arvisenkhtuvshin@gmail.com',
            'number' => '0123456789101112',
            'pin' => md5('000'),
            'balance' => 150000
        ]);
    }
}
