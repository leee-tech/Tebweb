<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use PharIo\Version\Exception;
use PhpParser\Error;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'admin@smartlife.ws',
            'name' => '1231212',
            'password' => bcrypt('123456'),
        ]);
        $user->assignRole('admin');
    }
}
