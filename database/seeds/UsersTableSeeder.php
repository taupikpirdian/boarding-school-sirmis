<?php

use App\Group;
use App\User;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group  = Group::where('name', 'Admin')->first();
        $user_admin = new User();
        $user_admin->name = 'Admin Master';
        $user_admin->email = 'adminMaster@sirmis.ponpes.id';
        $user_admin->password = bcrypt('AdminMaster!@#');
        $user_admin->photo = 'logo_admin.png';
        $user_admin->save();
        $user_admin->groups()->attach($group);

        $group  = Group::where('name', 'Santri')->first();
        $user_admin = new User();
        $user_admin->name = 'Admin Santri';
        $user_admin->email = 'adminSantri@sirmis.ponpes.id';
        $user_admin->password = bcrypt('AdminSantri#@!');
        $user_admin->photo = 'logo_admin.png';
        $user_admin->save();
        $user_admin->groups()->attach($group);
    }
}

