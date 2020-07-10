<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 2つのテストデータを同時に作成する
        $this->call(UsersTableSeeder::class);
        $this->call(DiariesTableSeeder::class);
    }
}

