<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mod_members;

class seed_member extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        mod_members::truncate();
        mod_members::create([
            'name' => 'arvis',
            'password' => md5('0000'),
            'addr' => 'Mongol',
            'rd' => 'AA00000000',
            'mobile' => '99999999',
            'email' => 'arvisenkhtuvshin@gmail.com',
            'type' => 'member'
        ]);
    }
}
