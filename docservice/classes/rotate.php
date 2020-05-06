<?php
class Rotate{
    public function __construct()
    {
        
    }
    	 /**
	 * @api {post}  rotate/t?positionX=0&positionY=0  Rotar 
	 * @apiParam (GET) {Number} positionX posición en x donde quiere que aparezca la ficha.
     *@apiParam (GET) {Number} positionY posición en y donde quiere que aparezca la ficha.
     *@apiParam (POST) {Array} matrix Array de la matriz que se va rotar. [[0,1,0],[1,1,0],[0,1,0]]
	 
	 * @apiVersion 0.0.1
	 * @apiName Letra T
	 * @apiGroup Letra T
	 * @apiDescription Este rescurso rotara la matriz de la figura 90º .
	 *
	 *   
	 *
	 *
	 * @apiSuccessExample Respuesta:
	 * HTTP/1.1 200 OK{
	 *   {
     *  "matrix": [
	 * 	 [0,0,0],
	 *	 [1,1,1],
	 *	 [0,1,0]
	 *	 ],
	 *	x:0,
	 *	y:0
	 *    }
 	 *}
	 * @apiSuccessExample Ejemplo JavaScript:
	 * 
    let info = {
        matrix:[
            [0,0,0],
            [1,1,1],
            [0,1,0]
        ]
    }
    var misCabeceras = new Headers({
        'Content-Type': 'application/json'
    });
    var options = {
        method: 'POST',
        headers: misCabeceras,
        mode: 'cors',
        body:JSON.stringify(info)
        }
    fetch('http://localhost:8000/api/tetris/draw/t?positionX=5&positionY=0')
	.then(function(response) {
	 return response.json();
	})
	.then(function(myJson) {
	 console.log(myJson);
	});
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