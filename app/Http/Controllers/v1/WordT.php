<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WordT extends Controller
{
    //Posibles posiciones de Letra
    const MATRICES =[
                        [
                            [0,0,0],
                            [1,1,1],
                            [0,1,0]
                        ],
                        [
                            [0,1,0],
                            [0,1,1],
                            [0,1,0]
                        ],
                        [
                            [0,1,0],
                            [1,1,1],
                            [0,0,0]
                        ],
                        [
                            [0,1,0],
                            [1,1,0],
                            [0,1,0]
                        ]
                    ];

    public function  draw(Request $request)
    {
        //Valida los datos enviados
        $validaror = Validator::make($request->all(), [
            'positionX' => 'required|max:2|regex:([0-9])',
            'positionY' => 'required|max:2|regex:([0-9])'           
        ]);
        
        //Valida si hay error
        if($validaror->fails()){
            return response()->json([
                'error' => $validaror->errors()->first(),
            ], 401);
        }

        $matriz = static::MATRICES[0];
        return response()->json([
            'matrix' => $matriz,
            'x' => (int)$request->get('positionX'),
            'y' => (int)$request->get('positionY')
        ], 200);
    }
    public function rotate(Request $request){
        
        //Valida los datos enviados

        $validaror = Validator::make($request->all(), [
            'positionX' => 'required|max:2|regex:([0-9])',
            'positionY' => 'required|max:2|regex:([0-9])'
        ]);
        
        //Valida si hay error
        if($validaror->fails()){
            return response()->json([
                'error' => $validaror->errors()->first(),
            ], 401);
        }

        //  array_reverse($matriz);

        //Decodifica el request de tetramino
        $matriz = $request->get('matrix');

        //Almacena request turn 0 = izquierda, 1 = derecha
        $turn = 1;

        //Recorre el arreglo de matrices
        foreach (static::MATRICES as $key => $matrices) {
            //Identifica igualdad de matriz
            if($matrices == $matriz){
                //Valida tipo de turn
                if($turn == 1){
                    //Identifica posición de matriz para asginar valor correcto
                    if($key == count(static::MATRICES)-1){
                        $pos = 0;
                    }else{
                        $pos = $key+$turn;
                    }
                    //Asigna Matriz a entregar
                    $matResul = static::MATRICES[$pos];
                }else{
                    //Identifica posición de matriz para asginar valor correcto
                    if($key == 0){
                        $pos = count(static::MATRICES)-1;
                    }else{
                        $pos = $key-$turn;
                    }
                    //Asigna Matriz a entregar
                    $matResul = static::MATRICES[$pos];
                }
                
            }
        } 

         return response()->json([
            'matrix' => $matResul,
            'x' => (int)$request->get('positionX'),
            'y' => (int)$request->get('positionY')
        ], 200);

    }

    public function move(Request $request){
        
        //Valida los datos enviados
        $validaror = Validator::make($request->all(), [
            'positionX' => 'required|max:2|regex:([0-9])',
            'positionY' => 'required|max:2|regex:([0-9])',
            'move' => 'required','regex:/(left)|(right)|(down)/'
        ]);
        
        //Valida si hay error
        if($validaror->fails()){
            return response()->json([
                'error' => $validaror->errors()->first(),
            ], 401);
        }

        //Variables necesarias
        $ejeX = (int)$request->get('positionX');
        $ejeY = (int)$request->get('positionY');

        //Se modifica la posición dependiendo del move
        switch ($request->get('move')) {
            case 'left':
                $ejeX--;
                break;
            case 'right':
                $ejeX++;
                break;
            case 'down':
                $ejeY++;
                break;
        }
        
         return response()->json([
            'matrix' => $request->get('matrix'),
            'x' => $ejeX,
            'y' => $ejeY
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