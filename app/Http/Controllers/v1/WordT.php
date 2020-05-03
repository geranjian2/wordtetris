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
                            [1,1,1],
                            [0,1,0],
                            [0,1,0]
                        ],
                        [
                            [0,0,1],
                            [1,1,1],
                            [0,0,1]
                        ],
                        [
                            [0,1,0],
                            [0,1,0],
                            [1,1,1]
                        ],
                        [
                            [1,0,0],
                            [1,1,1],
                            [1,0,0]
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
            'tetramino_t' => $matriz,
            'x' => (int)$request->get('positionX'),
            'y' => (int)$request->get('positionY')
        ], 200);
    }

    public function rotate(Request $request){
        
        //Valida los datos enviados
        $validaror = Validator::make($request->all(), [
            'matrix' => 'required|max:25|regex:(^(\[)+(\[)+[0-1]+(\,)+[0-1]+(\,)+[0-1]+(\])+(\,)+(\[)+[0-1]+(\,)+[0-1]+(\,)+[0-1]+(\])+(\,)+(\[)+[0-1]+(\,)+[0-1]+(\,)+[0-1]+(\])+(\]))',
            'turn' => 'required|regex:([0-1]{1})',
            'positionX' => 'required|max:2|regex:([0-9])',
            'positionY' => 'required|max:2|regex:([0-9])'
        ]);
        
        //Valida si hay error
        if($validaror->fails()){
            return response()->json([
                'error' => $validaror->errors()->first(),
            ], 401);
        }

        //Variables necesarias
        $matResul = [];
        $pos = 0;

        //Decodifica el request de tetramino
        $matriz = json_decode($request->get('matrix'));

        //Almacena request turn 0 = izquierda, 1 = derecha
        $turn = $request->get('turn');

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
            'tetramino_t' => $matResul,
            'x' => (int)$request->get('positionX'),
            'y' => (int)$request->get('positionY')
        ], 200);

    }

    public function move(Request $request){
        
        //Valida los datos enviados
        $validaror = Validator::make($request->all(), [
            'matrix' => 'required|max:25|regex:(^(\[)+(\[)+[0-1]+(\,)+[0-1]+(\,)+[0-1]+(\])+(\,)+(\[)+[0-1]+(\,)+[0-1]+(\,)+[0-1]+(\])+(\,)+(\[)+[0-1]+(\,)+[0-1]+(\,)+[0-1]+(\])+(\]))',
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
                $ejeY--;
                break;
        }
        
         return response()->json([
            'tetramino_t' => json_decode($request->get('matrix')),
            'x' => $ejeX,
            'y' => $ejeY
        ], 200);

    }
    
}
