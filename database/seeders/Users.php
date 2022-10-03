<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'username' => 'admin',
            'name' => 'Admin',
            'phone' => '0',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
        // for ($i=0; $i < 50; $i++) {
        //     factory(User::class)->create();
        // }
    }
}
