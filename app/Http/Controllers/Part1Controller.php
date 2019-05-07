<?php

namespace App\Http\Controllers;

use App\Part1;
use App\ListeningPart;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class Part1Controller extends Controller
{
    //lấy view update part1
    public function get(Request $request)
    {
        // $idPartNghe=$request["id"];
        $part1 = ListeningPart::find(1);
        // print_r("1111");
        return view('update_part_1')
            ->with("part1", $part1);
    }

    // tạo câu part 1
    public function create(Request $request)
    {
        $listeningPart = $request["part1"];
        $listCauString = $request["listCau"];

        $paraJson = json_decode($listeningPart, true);

        $listeningPart = ListeningPart::create($paraJson);

        $listCauJson = json_decode($listCauString, true);
        foreach ($listCauJson as $cauJson) {
            \error_log("7");
            $listeningPart->part1()->create($cauJson);
        }
        return Response($paraJson, 200);
    }

    //update câu part 1
    public function update(Request $request)
    {
        $listeningPart = $request["part1"];
        $listCauString = $request["listCau"];
        $paraJson = json_decode($listeningPart, true);

        try {

            ListeningPart::find(((Object)$paraJson)->id)->update($paraJson);

            $listCauJson = json_decode($listCauString, true);
            foreach ($listCauJson as $cauJson) {
                Part1::find(((Object)$cauJson)->id)->update($cauJson);
            }
            return 1;
        } catch (Exception $e) { }
        return 2;
    }

    public function delete(Request $request){
        // $id = $request["id"];
        try {
            $part1 = ListeningPart::find(1);
            $part1->part1()->delete();
            $part1->delete();
            return 1;
        }catch (\Exception $e){

        }
        return 2;
    }
}
