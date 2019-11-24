<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'cpf' => '12675064661',
                'name' => 'Carlos Henrique',
                'surname' => 'Abreu',
                'email' => 'carloshpa.mg4@me.com',
                'password' => Hash::make('secret'),
                'street' => 'Francisco Teles',
                'number' => 27,
                'postal_code' => '35930021',
                'complment' => 'Apt 101',
                'city' => 'João Monlevade',
                'state' => 'MG',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'cpf' => '10670649660',
                'name' => 'Hanna',
                'surname' => 'Paranhos',
                'email' => 'hannapp10@gmail.com',
                'password' => Hash::make('secret'),
                'street' => 'Sanitária',
                'number' => 66,
                'postal_code' => '35930021',
                'complment' => 'Apt 101',
                'city' => 'João Monlevade',
                'state' => 'MG',
                'created_at' => now(),
                'updated_at' => now()
            ]

        );

        foreach($users as $user){
            DB::table('users')->insert($user);
        }
    }
}
