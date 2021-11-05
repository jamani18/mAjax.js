# mAjax.js
mAjax.js doing ajax connections easier and faster than jquery.  Features include: Use GET and POST parameters, decode and encode JSON objects automatically, have the structure for send data easily, callbacks, timeout, and more...

## Install

**Manual**

Just download js/mAjax.min.js file, and add js/mAjax.min.js on your HTML file:

```html
<script src="js/mAjax.min.js"></script>
```

## Requirements


**Server**

For the correct functioning of the script, the application must be structured so that all requests reach the same file on the server. This file will be in charge of redirecting to the method that the client requests, introducing it as a parameter.

The parameter that the server will listen to to redirect to the appropriate method is **action**.


_An example in PHP of that redirector file:_

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

Once the server file is configured correctly. You just have to indicate to mAjax.js the name of the file where it will send the request through a URL.

_If the file is called *Switch* we can skip this step._

```js
mAjax.serverFile = 'MyServerFile.php'
```


## Usage

To send the requests to the server, you would only have to use the following methods:


**GET Requests**

```js
sendAjaxGet(async,serverMethod,sendData,callBack,ontimeoutcall,timeout);
```

**POST Requests**

```js
sendAjaxPost(async,serverMethod,sendData,callBack,ontimeoutcall,timeout);
```


**Parameters**

The function of the parameters is as follows:

**async:** . boolean. Make the connection synchronously or asynchronously.

**serverMethod:** . String. Method to be called on the server.

**sendData:** . Object. Parameters to be sent to the server.

**callBack:** . Function. Method that will be executed when the response from the server arrives.

**onTimeoutCall:** . Function. Method to be executed if the server response times out.

**timeout:** . int.  Time in milliseconds that the server will wait for the response. Default is 10000



## Example

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

