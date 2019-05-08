<?php

use Illuminate\Database\Seeder;
use App\Model\Admin;
class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['name'=>'abozaid','email'=>'abozaid@mail.com','password'=>bcrypt(111)]);
    }
}
