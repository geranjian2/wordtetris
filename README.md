![alt text](https://i.blogs.es/d215a7/tetris-2/1366_2000.jpg) 
# Wordtetris T
Wordtetris T, es un API desarrollado en php con el framework Laravel, para ser utilizado como letra T en un tetris.

## Pre-requisitos
* Git
* Composer
* php 7.x o superior

## Instalación
Se debe clonar el repositio de git:

```git clone https://github.com/geranjian2/wordtetris.git```

Posteriormente se debe instalar composer dentro del repositorio para generar las dependencias del proyecto.

```composer install```

## Uso JavaScript 
### Metodo Obtener
```javascript
  fetch('http://localhost:8000/api/tetris/draw/t?positionX=5&positionY=0')
	.then(function(response) {
	 return response.json();
	})
	.then(function(myJson) {
	 console.log(myJson);
	});
```

## Uso php 
### Metodo Obtener
```php
  $domain = 'http://localhost:8000/api/tetris/';
  $headers = array(
			'Content-Type:application/json',
		 );
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $domain.'draw/t?positionX=6&positionY=0');
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  curl_close($ch);
  $r = json_decode($result, true); 
  if(is_array($r))
  {
  	echo "<pre>";
  	print_r($r);
  	echo "</pre>";
  }else{
  	echo $result;
  }
```

### Otros Metodos
#### * Mover
#### * Rotar

## Mas información
En el siguiente enlace prodrás encontrar toda la información del API y su uso.

https://simisoftware.com/tetrisdocs/#api-Letra_T

## Contribuyendo
Esta contribución se realiza para proyecto de la Universidad bajo el pograma de Calidad de Software.

## Autores
LUIS MANRIQUE

GERMAN JIMENEZ

YULY CASTAÑO

JOSE TELLEZ

LAURA VELASQUEZ

## Licencia
[MIT](https://choosealicense.com/licenses/mit/)
