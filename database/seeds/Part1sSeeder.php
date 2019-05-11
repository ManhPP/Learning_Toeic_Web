<?php

use App\ListeningPart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Part1sSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 1')->get()->random()->id;
        for($index=0;$index<10;$index++)
        {
            DB::table('part1s')->insert([
                'idPartNghe' =>$idPartNghe,
                'anh' =>'images_upload/'.$idPartNghe.'_'.Str::random(5).'.png',
                'dADung'=>'A',
            ]);
        }

        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 1')->get()->random()->id;
        for($index=0;$index<10;$index++)
        {
            DB::table('part1s')->insert([
                'idPartNghe' =>$idPartNghe,
                'anh' =>'images_upload/'.$idPartNghe.'_'.Str::random(5).'.png',
                'dADung'=>'A',
            ]);
        }

        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 1')->get()->random()->id;
        for($index=0;$index<10;$index++)
        {
            DB::table('part1s')->insert([
                'idPartNghe' =>$idPartNghe,
                'anh' =>'images_upload/'.$idPartNghe.'_'.Str::random(5).'.png',
                'dADung'=>'A',
            ]);
        }
        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 1')->get()->random()->id;
        for($index=0;$index<10;$index++)
        {
            DB::table('part1s')->insert([
                'idPartNghe' =>$idPartNghe,
                'anh' =>'images_upload/'.$idPartNghe.'_'.Str::random(5).'.png',
                'dADung'=>'A',
            ]);
        }
        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 1')->get()->random()->id;
        for($index=0;$index<10;$index++)
        {
            DB::table('part1s')->insert([
                'idPartNghe' =>$idPartNghe,
                'anh' =>'images_upload/'.$idPartNghe.'_'.Str::random(5).'.png',
                'dADung'=>'A',
            ]);
        }
        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 1')->get()->random()->id;
        for($index=0;$index<10;$index++)
        {
            DB::table('part1s')->insert([
                'idPartNghe' =>$idPartNghe,
                'anh' =>'images_upload/'.$idPartNghe.'_'.Str::random(5).'.png',
                'dADung'=>'A',
            ]);
        }
        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 1')->get()->random()->id;
        for($index=0;$index<10;$index++)
        {
            DB::table('part1s')->insert([
                'idPartNghe' =>$idPartNghe,
                'anh' =>'images_upload/'.$idPartNghe.'_'.Str::random(5).'.png',
                'dADung'=>'A',
            ]);
        }
        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 1')->get()->random()->id;
        for($index=0;$index<10;$index++)
        {
            DB::table('part1s')->insert([
                'idPartNghe' =>$idPartNghe,
                'anh' =>'images_upload/'.$idPartNghe.'_'.Str::random(5).'.png',
                'dADung'=>'A',
            ]);
        }

    }
}
