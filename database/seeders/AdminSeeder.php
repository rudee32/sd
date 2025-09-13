<?php
// database/seeders/AdminSeeder.php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin SD',
            'email' => 'admin@sd.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}
