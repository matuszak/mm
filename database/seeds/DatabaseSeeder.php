<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Lailson',
            'email' => 'lailsonbr@gmail.com',
            'password' => bcrypt('qwe123'),

        ]);
    }
}
