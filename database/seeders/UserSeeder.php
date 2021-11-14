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
            'first_name' => 'Mohammad',
            'last_name' => 'Test',
            'password' => bcrypt('123456'),
        ]);
        $user->assignRole('admin');
    }
}
