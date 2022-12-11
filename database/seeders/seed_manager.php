<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mod_managers;

class seed_manager extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        mod_managers::truncate();
        mod_managers::create([
            'email' => 'arvis@gmail.com',
            'password' => md5('0000'),
            'type' => 'manager'
        ]);
    }
}
