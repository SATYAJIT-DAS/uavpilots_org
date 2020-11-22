<?php

use Illuminate\Database\Seeder;

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
        DB::table('admins')->delete();
        $adminsrecords =[
            [
                'id'=>1,'name'=>'admin','type'=>'admin','email'=>'admin@admin.com','password'=>'$2y$10$NvMBZ2SjWXF2qSWa/lo1RuyUEkakpvhchik.EG2PwfekCzbJ.QcHO','status'=>1,'image'=>''
            ],
            [
                'id'=>2,'name'=>'satya','type'=>'subadmin','email'=>'satya@admin.com','password'=>'$2y$10$NvMBZ2SjWXF2qSWa/lo1RuyUEkakpvhchik.EG2PwfekCzbJ.QcHO','status'=>1,'image'=>''
            ],
            [
                'id'=>3,'name'=>'john','type'=>'subadmin','email'=>'john@admin.com','password'=>'$2y$10$NvMBZ2SjWXF2qSWa/lo1RuyUEkakpvhchik.EG2PwfekCzbJ.QcHO','status'=>1,'image'=>''
            ],
            [
                'id'=>4,'name'=>'altaf','type'=>'admin','email'=>'altaf@admin.com','password'=>'$2y$10$NvMBZ2SjWXF2qSWa/lo1RuyUEkakpvhchik.EG2PwfekCzbJ.QcHO','status'=>1,'image'=>''
            ],

        ];
        foreach ($adminsrecords as $key => $record) {
            # code...
            \App\Models\Admin::create($record);
        }
    }
}
