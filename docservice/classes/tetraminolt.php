<?php
class TetraminoT
{

	public function __construct()
	{
		
	}

	/**
	 * @api {get}  /  Obtener Letra T

	 * @apiVersion 0.0.1
	 * @apiName Tetramino T
	 * @apiGroup Tetramino
	 * @apiDescription Este rescurso obtiene la letra T para implementar en un Tetris.
	 *
	 *   
	 *
	 *
	 * @apiSuccessExample Respuesta:
	 * HTTP/1.1 200 OK{
	 *    {
     * 	   "tetramino_t": [
	 * 		 [0,0,0],
	 *		 [1,1,1],
	 *		 [0,1,0]
	 *	    ]
	 *    }
 	 *	}
	 * @apiSuccessExample Ejemplo JavaScript:
	 * 
	 * $.ajax({
	 *  url: 'http://localhost:8000/api/',
	 *	type: 'GET',
	 *	'dataType': "json",
	 *	success:function(response)
	 *	{
	 *	   console.log(response);
	 *	}
	 *				
	 *});
	 *
	 * @apiSuccessExample Ejemplo PHP:
	 *   $ch = curl_init();
	 *   curl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/api/');
	 *   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	 *   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 *   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	 *   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	 *   $result = curl_exec($ch);
	 *   curl_close($ch);
	 *   $r = json_decode($result, true); 
	 *   if(is_array($r))
	 *   {
	 *   	echo "<pre>";
	 *   	print_r($r);
	 *   	echo "</pre>";
	 *   }else{
	 *   	echo $result;
	 *   }
	 *   
	 * 
	 *
	 * 
	 */

	
}