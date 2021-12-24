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
            'email' => 'fawzi@gmail.com',
            'first_name' => 'Fawzi',
            'last_name' => 'Alshiyyab',
            'password' => bcrypt('123456'),
        ]);
        $user->assignRole('admin');
        $user = User::create([
            'email' => 'doctor@gmail.com',
            'first_name' => 'Doctor',
            'last_name' => 'Doctor',
            'password' => bcrypt('123456'),
        ]);
        $user->assignRole('doctor');
        $user = User::create([
            'email' => 'patient@gmail.com',
            'first_name' => 'Patient',
            'last_name' => 'Patient',
            'password' => bcrypt('123456'),
        ]);
        $user->assignRole('patient');
    }
}
