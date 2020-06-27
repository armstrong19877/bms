<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $teacherRole = Role::where('name', 'teacher')->first();
        $scholarRole = Role::where('name', 'scholar')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
        	'name' => 'Admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin')
        ]);

        $teacher = User::create([
        	'name' => 'Teacher',
        	'email' => 'teacher@teacher.com',
        	'password' => bcrypt('teacher')
        ]);

        $scholar = User::create([
        	'name' => 'Student',
        	'email' => 'scholar@scholar.com',
        	'password' => bcrypt('student')
        ]);

         $user = User::create([
        	'name' => 'User',
        	'email' => 'user@user.com',
        	'password' => bcrypt('user')
        ]);


        $admin->roles()->attach($adminRole);
        $teacher->roles()->attach($teacherRole);
        $scholar->roles()->attach($scholarRole);
        $user->roles()->attach($userRole);
        

       // factory(App\User::class, 50)->create();
    }
}
