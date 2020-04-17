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

    public function  WordT()
    {
        $matriz = static::MATRICES[0];
        return response()->json([
            'tetramino_t' => $matriz
        ], 200);
    }

    public function rotate(Request $request){
        
        //Valida los datos enviados
        $validaror = Validator::make($request->all(), [
            'tetramino' => 'required|max:25|regex:(^(\[)+(\[)+[0-1]+(\,)+[0-1]+(\,)+[0-1]+(\])+(\,)+(\[)+[0-1]+(\,)+[0-1]+(\,)+[0-1]+(\])+(\,)+(\[)+[0-1]+(\,)+[0-1]+(\,)+[0-1]+(\])+(\]))',
            'giro' => 'required|regex:([0-1]{1})'
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
        $matriz = json_decode($request->get('tetramino'));

        //Almacena request giro 0 = izquierda, 1 = derecha
        $giro = $request->get('giro');

        //Recorre el arreglo de matrices
        foreach (static::MATRICES as $key => $matrices) {
            //Identifica igualdad de matriz
            if($matrices == $matriz){
                //Valida tipo de giro
                if($giro == 1){
                    //Identifica posición de matriz para asginar valor correcto
                    if($key == count(static::MATRICES)-1){
                        $pos = 0;
                    }else{
                        $pos = $key+$giro;
                    }
                    
                    $matResul = static::MATRICES[$pos];
                }else{
                    //Identifica posición de matriz para asginar valor correcto
                    if($key == 0){
                        $pos = count(static::MATRICES)-1;
                    }else{
                        $pos = $key-$giro;
                    }
                    //Asigna Matriz a entregar
                    $matResul = static::MATRICES[$pos];
                }
                
            }
        } 

         return response()->json([
            'tetramino_t' => $matResul
        ], 200);

    }
    
}
