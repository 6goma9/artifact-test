<?php

use Illuminate\Database\Seeder;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('managers')->insert([
            [
                'mail_address' => 'your.mail_address',
                'password' => password_hash('your.password', PASSWORD_BCRYPT),
            ]
        ]);
    }
}
