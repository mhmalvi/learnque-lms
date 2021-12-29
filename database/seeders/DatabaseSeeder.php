<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminInfo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $admin = Admin::create([
            'uuid' => Str::orderedUuid(),
            'name' => 'Admin',
            'email' => 'admin@quadque.tech',
            'password' => Hash::make('admin')
        ]);
        AdminInfo::create([
            "user_id" => $admin->id
        ]);
    }
}
