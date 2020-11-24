<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = '123456789';
        $password =  Hash::make($password);
        DB::table('admins')->delete();
        $adminsrecords = [
            [
                'id' => 1, 'name' => 'admin', 'type' => 'admin', 'email' => 'admin@admin.com', 'password'
                => $password, 'status' => 1, 'image' => ''
            ],
            [
                'id' => 2, 'name' => 'satya', 'type' => 'subadmin', 'email' => 'satya@admin.com', 'password'
                => $password, 'status' => 1, 'image' => ''
            ],
            [
                'id' => 3, 'name' => 'john', 'type' => 'subadmin', 'email' => 'john@admin.com', 'password'
                => $password, 'status' => 1, 'image' => ''
            ],
            [
                'id' => 4, 'name' => 'altaf', 'type' => 'admin', 'email' => 'altaf@admin.com', 'password'
                => $password, 'status' => 1, 'image' => ''
            ],

        ];
        foreach ($adminsrecords as $key => $record) {
            # code...
            \App\Models\Admin::create($record);
        }
    }
}
