define({ "api": [
  {
    "type": "get",
    "url": "draw/t?positionX=0&positionY=0",
    "title": "Obtener",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "positionX",
            "description": "<p>posición en x donde quiere que aparezca la ficha.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "positionY",
            "description": "<p>posición en y donde quiere que aparezca la ficha.</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "name": "Letra",
    "group": "Letra_T",
    "description": "<p>Este recurso es el primero para poder obtener el arreglo de la letra T para ser implementado en juego de tetris</p>",
    "success": {
      "examples": [
        {
          "title": "Respuesta:",
          "content": "HTTP/1.1 200 OK{\n  {\n \"matrix\": [\n\t [0,0,0],\n\t [1,1,1],\n\t [0,1,0]\n\t ],\n\tx:0,\n\ty:0\n   }\n}",
          "type": "json"
        },
        {
          "title": "Ejemplo JavaScript:",
          "content": "\n    fetch('http://localhost:8000/api/tetris/draw/t?positionX=5&positionY=0')\n\t.then(function(response) {\n\t return response.json();\n\t})\n\t.then(function(myJson) {\n\t console.log(myJson);\n\t});",
          "type": "json"
        },
        {
          "title": "Ejemplo PHP:",
          "content": "$ch = curl_init();\ncurl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/api/');\ncurl_setopt($ch, CURLOPT_CUSTOMREQUEST, \"GET\");\ncurl_setopt($ch, CURLOPT_RETURNTRANSFER, true);\ncurl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);\ncurl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);\n$result = curl_exec($ch);\ncurl_close($ch);\n$r = json_decode($result, true); \nif(is_array($r))\n{\n\techo \"<pre>\";\n\tprint_r($r);\n\techo \"</pre>\";\n}else{\n\techo $result;\n}",
          "type": "json"
        }
      ]
    },
    "filename": "classes/draw.php",
    "groupTitle": "Letra_T"
  },
  {
    "type": "post",
    "url": "rotate/t?positionX=0&positionY=0",
    "title": "Rotar",
    "parameter": {
      "fields": {
        "GET": [
          {
            "group": "GET",
            "type": "Number",
            "optional": false,
            "field": "positionX",
            "description": "<p>posición en x donde quiere que aparezca la ficha.</p>"
          },
          {
            "group": "GET",
            "type": "Number",
            "optional": false,
            "field": "positionY",
            "description": "<p>posición en y donde quiere que aparezca la ficha.</p>"
          }
        ],
        "POST": [
          {
            "group": "POST",
            "type": "Array",
            "optional": false,
            "field": "matrix",
            "description": "<p>Array de la matriz que se va rotar. [[0,1,0],[1,1,0],[0,1,0]]</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "name": "Letra_T",
    "group": "Letra_T",
    "description": "<p>Este rescurso rotara la matriz de la figura 90º .</p>",
    "success": {
      "examples": [
        {
          "title": "Respuesta:",
          "content": "HTTP/1.1 200 OK{\n  {\n \"matrix\": [\n\t [0,0,0],\n\t [1,1,1],\n\t [0,1,0]\n\t ],\n\tx:0,\n\ty:0\n   }\n}",
          "type": "json"
        },
        {
          "title": "Ejemplo JavaScript:",
          "content": "\n    let info = {\n        matrix:[\n            [0,0,0],\n            [1,1,1],\n            [0,1,0]\n        ]\n    }\n    var misCabeceras = new Headers({\n        'Content-Type': 'application/json'\n    });\n    var options = {\n        method: 'POST',\n        headers: misCabeceras,\n        mode: 'cors',\n        body:JSON.stringify(info)\n        }\n    fetch('http://localhost:8000/api/tetris/draw/t?positionX=5&positionY=0')\n\t.then(function(response) {\n\t return response.json();\n\t})\n\t.then(function(myJson) {\n\t console.log(myJson);\n\t});",
          "type": "json"
        },
        {
          "title": "Ejemplo PHP:",
          "content": "$ch = curl_init();\ncurl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/api/');\ncurl_setopt($ch, CURLOPT_CUSTOMREQUEST, \"GET\");\ncurl_setopt($ch, CURLOPT_RETURNTRANSFER, true);\ncurl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);\ncurl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);\n$result = curl_exec($ch);\ncurl_close($ch);\n$r = json_decode($result, true); \nif(is_array($r))\n{\n\techo \"<pre>\";\n\tprint_r($r);\n\techo \"</pre>\";\n}else{\n\techo $result;\n}",
          "type": "json"
        }
      ]
    },
    "filename": "classes/rotate.php",
    "groupTitle": "Letra_T"
  },
  {
    "type": "post",
    "url": "move/t?positionX=0&positionY=0&move={:move}",
    "title": "Mover",
    "parameter": {
      "fields": {
        "GET": [
          {
            "group": "GET",
            "type": "Number",
            "optional": false,
            "field": "positionX",
            "description": "<p>posición en x donde quiere que aparezca la ficha.</p>"
          },
          {
            "group": "GET",
            "type": "Number",
            "optional": false,
            "field": "positionY",
            "description": "<p>posición en y donde quiere que aparezca la ficha.</p>"
          },
          {
            "group": "GET",
            "type": "Number",
            "optional": false,
            "field": "move",
            "description": "<p>Debe enviar la palabra indicada para mover la ficha según corresponda. La siguientes serán las opciones que puede utilizar {move = right} mover una posición a la derecha, {move = left} mover una posición  a la izquierda, {move = down} mover una posición  vertical positiva</p>"
          }
        ],
        "POST": [
          {
            "group": "POST",
            "type": "Array",
            "optional": false,
            "field": "matrix",
            "description": "<p>Array de la matriz que se va rotar. [[0,1,0],[1,1,0],[0,1,0]]</p>"
          }
        ]
      }
    },
    "version": "0.0.1",
    "name": "Mover",
    "group": "Letra_T",
    "description": "<p>Este rescurso rotara la matriz de la figura 90º .</p>",
    "success": {
      "examples": [
        {
          "title": "Respuesta:",
          "content": "HTTP/1.1 200 OK{\n  {\n \"matrix\": [\n\t [0,0,0],\n\t [1,1,1],\n\t [0,1,0]\n\t ],\n\tx:-1,\n\ty:0\n   }\n}",
          "type": "json"
        },
        {
          "title": "Ejemplo JavaScript:",
          "content": "\n    let info = {\n        matrix:[\n            [0,0,0],\n            [1,1,1],\n            [0,1,0]\n        ]\n    }\n    var misCabeceras = new Headers({\n        'Content-Type': 'application/json'\n    });\n    var options = {\n        method: 'POST',\n        headers: misCabeceras,\n        mode: 'cors',\n        body:JSON.stringify(info)\n        }\n    fetch('http://localhost:8000/api/tetris/draw/t?positionX=5&positionY=0&move=left')\n\t.then(function(response) {\n\t return response.json();\n\t})\n\t.then(function(myJson) {\n\t console.log(myJson);\n\t});",
          "type": "json"
        },
        {
          "title": "Ejemplo PHP:",
          "content": "$ch = curl_init();\ncurl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/api/');\ncurl_setopt($ch, CURLOPT_CUSTOMREQUEST, \"GET\");\ncurl_setopt($ch, CURLOPT_RETURNTRANSFER, true);\ncurl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);\ncurl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);\n$result = curl_exec($ch);\ncurl_close($ch);\n$r = json_decode($result, true); \nif(is_array($r))\n{\n\techo \"<pre>\";\n\tprint_r($r);\n\techo \"</pre>\";\n}else{\n\techo $result;\n}",
          "type": "json"
        }
      ]
    },
    "filename": "classes/move.php",
    "groupTitle": "Letra_T"
  }
] });
