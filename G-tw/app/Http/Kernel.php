<?php  

namespace App\Http;  

use Illuminate\Foundation\Http\Kernel as HttpKernel;  

class Kernel extends HttpKernel  
{  
    protected $middleware = [  
        // Middleware global  
    ];  

    protected $middlewareGroups = [  
        'web' => [  
            // Middleware web  
        ],  
        'api' => [  
            // Middleware api  
        ],  
    ];  

    protected $middlewareAliases = [  
        // Middleware aliases  
    ];  

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    ];
    
}