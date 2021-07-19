<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user5 = new User();
        $user5->name = 'harold';
        $user5->email= 'harold@gmail.com';
        $user5->password = bcrypt('12345678');
        //$user5->assignRole('Admin');
        $user5->save();

        $user6 = new user();
        $user6->name = 'daniel';
        $user6->email= 'jsoliz064@gmail.com';
        $user6->password = bcrypt('1234');
        $user6->save();

        User::create([
            'name' => 'darwin',
            'email'=> 'darwinjr40@gmail.com',
            'password' => bcrypt('12345678')  
        ])->assignRole('Admin');

        //    ])->assignRole('Admin'); 
        /*
        $user7 = new user();
        $user7->name = 'darwin';
        $user7->email= 'darwinjr40@gmail.com';
        $user7->password = bcrypt('12345678');
        $user7->save();
        */
        $user8 = new user();
        $user8->name = 'Maria';
        $user8->email= 'mariaLance@gmail.com';
        $user8->password = bcrypt('87654321');
        $user8->save();

    }
}
