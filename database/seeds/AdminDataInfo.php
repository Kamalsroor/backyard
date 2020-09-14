<?php

use Illuminate\Database\Seeder;

class AdminDataInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \App\Admin::create([
            'name'     => 'KamalSroor',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
    }
}


