<?php

use App\ListeningPart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Part2sSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 2')->get()->random()->id;
        for($index=0;$index<30;$index++)
        {
            DB::table('part2s')->insert([
                'idPartNghe' =>$idPartNghe,
                'dADung'=>'A',
            ]);
        }

        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 2')->get()->random()->id;
        for($index=0;$index<30;$index++)
        {
            DB::table('part2s')->insert([
                'idPartNghe' =>$idPartNghe,
                'dADung'=>'A',
            ]);
        }

        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 2')->get()->random()->id;
        for($index=0;$index<30;$index++)
        {
            DB::table('part2s')->insert([
                'idPartNghe' =>$idPartNghe,
                'dADung'=>'A',
            ]);
        }

        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 2')->get()->random()->id;
        for($index=0;$index<30;$index++)
        {
            DB::table('part2s')->insert([
                'idPartNghe' =>$idPartNghe,
                'dADung'=>'A',
            ]);
        }

        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 2')->get()->random()->id;
        for($index=0;$index<30;$index++)
        {
            DB::table('part2s')->insert([
                'idPartNghe' =>$idPartNghe,
                'dADung'=>'A',
            ]);
        }

        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 2')->get()->random()->id;
        for($index=0;$index<30;$index++)
        {
            DB::table('part2s')->insert([
                'idPartNghe' =>$idPartNghe,
                'dADung'=>'A',
            ]);
        }

        $idPartNghe=App\ListeningPart::where('loaiPart', 'LIKE', 'Part 2')->get()->random()->id;
        for($index=0;$index<30;$index++)
        {
            DB::table('part2s')->insert([
                'idPartNghe' =>$idPartNghe,
                'dADung'=>'A',
            ]);
        }
    }
}
