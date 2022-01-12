<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'username' => 'admin',
            'name' => 'Employee Test',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('asdasd'),
            'account_status' => true,
        ]);
    }
}
