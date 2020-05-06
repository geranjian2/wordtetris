define({ "api": [
  {
    "type": "get",
    "url": "/",
    "title": "Obtener Letra T",
    "version": "0.0.1",
    "name": "Tetramino_T",
    "group": "Tetramino",
    "description": "<p>Este rescurso obtiene la letra T para implementar en un Tetris.</p>",
    "success": {
      "examples": [
        {
          "title": "Respuesta:",
          "content": "HTTP/1.1 200 OK{\n   {\n\t   \"tetramino_t\": [\n\t\t [0,0,0],\n\t\t [1,1,1],\n\t\t [0,1,0]\n\t    ]\n   }\n\t}",
          "type": "json"
        },
        {
          "title": "Ejemplo JavaScript:",
          "content": "\n$.ajax({\n url: 'http://localhost:8000/api/',\n\ttype: 'GET',\n\t'dataType': \"json\",\n\tsuccess:function(response)\n\t{\n\t   console.log(response);\n\t}\n\t\t\t\t\n});",
          "type": "json"
        },
        {
          "title": "Ejemplo PHP:",
          "content": "$ch = curl_init();\ncurl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/api/');\ncurl_setopt($ch, CURLOPT_CUSTOMREQUEST, \"GET\");\ncurl_setopt($ch, CURLOPT_RETURNTRANSFER, true);\ncurl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);\ncurl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);\n$result = curl_exec($ch);\ncurl_close($ch);\n$r = json_decode($result, true); \nif(is_array($r))\n{\n\techo \"<pre>\";\n\tprint_r($r);\n\techo \"</pre>\";\n}else{\n\techo $result;\n}",
          "type": "json"
        }
      ]
    },
    "filename": "classes/tetraminolt.php",
    "groupTitle": "Tetramino"
  }
] });
