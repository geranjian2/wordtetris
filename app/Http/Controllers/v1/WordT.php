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
            [5, 5, 5],
            [0, 5, 0]
        ];
        return response()->json([
            'tetramino_t' => $matriz
        ], 200);
    }
    public function rotate(Request $request){
        $matriz = $request->get('tetramino');
        // for( $y=0;$y<count($matriz);++$y){
        //     for($x=0;$x<$y;$x++){
        //         [
        //             $matriz[$x][$y],
        //             $matriz[$y][$x]
        //         ]
        //         =
        //         [
        //             $matriz[$y][$x],
        //             $matriz[$x][$y]
        //         ]
        //         ;
        //     }
        //  }

        //  array_reverse($matriz);


        $matriz = $this->rotateMatrix($matriz,3); 

         return response()->json([
            'tetramino_t' => $matriz
        ], 200);

    }
    public function rotateMatrix(&$mat,$N) 
    { 
      
          
        // Consider all  
        // squares one by one 
        for ($x = 0; $x < $N / 2; $x++) 
        { 
            // Consider elements  
            // in group of 4 in  
            // current square 
            for ($y = $x;  
                 $y < $N - $x - 1; $y++) 
            { 
                // store current cell 
                // in temp variable 
                $temp = $mat[$x][$y]; 
      
                // move values from 
                // right to top 
                $mat[$x][$y] = $mat[$y][$N - 1 - $x]; 
      
                // move values from 
                // bottom to right 
                $mat[$y][$N - 1 - $x] =  
                    $mat[$N - 1 - $x][$N - 1 - $y]; 
      
                // move values from  
                // left to bottom 
                $mat[$N - 1 - $x][$N - 1 - $y] =  
                             $mat[$N - 1 - $y][$x]; 
      
                // assign temp to left 
                $mat[$N - 1 - $y][$x] = $temp; 
            } 
        }
        return $mat;
    } 
}
