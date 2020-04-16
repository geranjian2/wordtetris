<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class WordT extends Controller
{
    //
    public function  WordT()
    {
        $matriz = [
            [0, 0, 0],
            [1, 1, 1],
            [0, 1, 0]
        ];
        return response()->json([
            'tetramino_t' => $matriz
        ], 200);
    }
    public function rotate(Request $request){
        // $matriz = json_decode($request->get('tetramino'));
        $matriz[0]  = [0,1,0];
        $matriz[1]  = [1,1,0];
        $matriz[2]  = [0,1,0];
        for( $y=0;$y<count($matriz);++$y){
            for($x=0;$x<$y;$x++){
                [
                    $matriz[$x][$y],
                    $matriz[$y][$x]
                ]
                =
                [
                    $matriz[$y][$x],
                    $matriz[$x][$y]
                ]
                ;
            }
         }

         array_reverse($matriz);

         return response()->json([
            'tetramino_t' => $matriz
        ], 200);

    }
}
