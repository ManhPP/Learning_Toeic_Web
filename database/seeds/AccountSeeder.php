<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    public function run()
    {
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_User',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_User',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_User',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_User',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
        DB::table('accounts')->insert([
            'hoTen' => Str::random(15),
            'username' =>Str::random(15),
            'ngaySinh' =>Carbon::create('1998','01','01'),
            'pass' => bcrypt('secret'),
            'email' => Str::random(10).'@gmail.com',
            'gioiTinh'=>'Nu',
            'hasRole' =>'Role_Admin',
            'active' =>1,
        ]);
    }
}
