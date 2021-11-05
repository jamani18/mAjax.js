# mAjax.js
mAjax.js doing ajax connections easier and faster than jquery.  Features include: Use GET and POST parameters, decode and encode JSON objects automatically, have the structure for send data easily, callbacks, timeout, and more...

## Install

**Manual**

Just download js/mAjax.min.js file, and add js/mAjax.min.js on your HTML file:

```html
<script src="js/mAjax.min.js"></script>
```

### Requirements


**Servidor**

Para el correcto funciomamiento del script, hay que estructurar la aplicación para que todas las peticiones lleguen a un mismo fichero en el servidor. Ese fichero se encargará de rediriguir al método que el cliente solicita introduciendolo como parametro.

El parámetro que escuchara el servidor para redirigir al método adecuado es **action**.


_Un ejemplo en PHP de ese fichero redireccionador:_

```php
<?php

    switch($_REQUEST['action']){
        
        //exampleAjax.
        case "exampleMethod": exampleMethod($_POST['data']);break;
     
    }


    //Recommended put this method on another file.
    //require realpath('ajax/exampleAjax.php');
    function exampleMethod($dataJSON){

        $response = 'false';

        $data = json_decode($dataJSON,true);
        $issetParams = isset($data['name']);

        if($issetParams){
            //Action with 'name' value.
            $response = 'true';
        }

        echo $response;

    }
            

```

**Javascript**

Una vez configurado el fichero del servidor correctamente. Solo habría que indicar a mAjax.js como se llama el fichero donde enviará la petición mediante una URL.

_Si el fichero es llamado *Switch* podemos saltar este paso._

```js
mAjax.serverFile = 'MyServerFile.php'
```


### Usage

Para enviar las peticiones al servidor solo habría que utilizar los siguientes métodos:


**Peticiones por GET**

```js
sendAjaxGet(async,serverMethod,sendData,callBack,ontimeoutcall,timeout);
```

**Peticiones por POST**

```js
sendAjaxPost(async,serverMethod,sendData,callBack,ontimeoutcall,timeout);
```


**Parámetros**

La función de los parametros es la siguiente:

**async:** . boolean. Realiza la conexión de forma sincrona o asincrona.

**serverMethod:** . String. Método que se llamará en el servidor.

**sendData:** . Object. Parametros que se enviarán al servidor.

**callBack:** . Function. Metodo que se ejecutará cuando llegue la respuesta del servidor.

**onTimeoutCall:** . Function. Método que se ejecutará si expira el tiempo de espera para la respuesta del servidor.

**timeout:** . int.  Tiempo en milisegundos que esperará al servidor la respuesta. Por defecto es 10000



## Ejemplo

```js

//Send a POST request to server, calling exampleMethod and showing alert message with response. 
//If response time expired, will show an alert message with info.
sendAjaxPost(true,'exampleMethod',{name:'Juan'},function(response){
  alert('Message from server: '+response);
},
function(){
  alert('Expired waiting time');
},5000);
```

