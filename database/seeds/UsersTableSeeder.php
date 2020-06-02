<?php

use Illuminate\Database\Seeder;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 1; $i++) {
            User::create([
                'name'    => '管理人',
                'email'          => 'e1697@icloud.com',
                'user_name'      => 'test_user',
                'introduction'   => '宜しくお願いいたします。',
                'profile_image'  => null,
                'password'       => Hash::make('koki1697'),
                'admin'          => true,
                'remember_token' => str_random(10),
                'created_at'     => now(),
                'updated_at'     => now()
            ]);
        }
    }
}
