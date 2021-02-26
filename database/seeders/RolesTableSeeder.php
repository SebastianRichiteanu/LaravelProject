<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{

    public function run()
    {
        Role::truncate();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'user']);
    }
}
