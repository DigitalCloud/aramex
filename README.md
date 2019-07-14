[![Latest Stable Version](https://poser.pugx.org/digitalcloud/laravel-forwarder/v/stable)](https://packagist.org/packages/digitalcloud/laravel-forwarder)
[![Total Downloads](https://poser.pugx.org/digitalcloud/laravel-forwarder/downloads)](https://packagist.org/packages/digitalcloud/laravel-forwarder)

# Laravel Forwarder.

This package allow you to forward the request from your project to another link.
The forwarded request will be carry all original information.

This package is also give you the capability to get the response inside your code, and manipulate it before returning it as a final response.

###
Much more, you can also modify the request before sending it to the remote link as you need.

## Installation

You can install the package via composer:

```bash

composer require digitalcloud/laravel-forwarder

```

In Laravel 5.5 the service provider will automatically get registered. In older versions of the framework just add the service provider in config/app.php file:

```php

    'providers' => [
        DigitalCloud\Forwarder\ForwarderServiceProvider::class,
    ];

```


After installation, you need to register the middleware "Forward" into your kernel in "routeMiddleware" array
```php

    protected $routeMiddleware => [
            ....
            'forward' =>  \DigitalCloud\Forwarder\Http\Middleware\Forward::class
    ];

```

## How To Use

Now you can use new function on your route file as 

```php
Route::forward(['post'], 'http://example.com', 'posts', 'PostController@index');
```
This route function will make a request in background to the specified domain followed by the route
###
For example, the above sample will forward post request to "http://example.com/posts".

### Note:
If you using api.php route file, the above sample will forward to "http://example.com/api/posts"

After the request handled, the package will pass the result as "response" property in the request to the function  'PostController@index', which you can handle, update, and return result
```php

    public function index(Request $request)
    {
        $result = $request->response;
    
        return $result;
    }

```
## Before Request

Do you need to update the request before send?? it's very simple, just create a function on the same controller with prefix "before"
###
For example, if the function name on your controller is "index", you have to make another one with "beforeIndex" name and the package will take care of the remain

### Note:
Note that any before function should return "Request" object so that can be passed to the remain chain.

```php

    public function beforeIndex(Request $request)
    {
        // make your request manipulations here
        $request = $request->merge(['token' => 'token', 'secret' => 'xxx']);

        // then return the final request
        return $request;
    }

``` 
