<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Core\RolesUsers as MRolesUsers;

class RolesUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MRolesUsers::create(['roles_id' => 1, 'users_id' => 1]);
    }
}
