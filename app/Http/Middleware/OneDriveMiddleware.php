<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;


class OneDriveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $query = http_build_query([
            'client_id' => env('ONEDRIVE_CLIENT_ID'),
            'response_type' => 'code',
            'redirect_uri' => env('ONEDRIVE_REDIRECT_URI'),
            'response_mode' => 'query',
            'scope' => 'User.Read Files.ReadWrite',
        ]);

        return redirect('https://login.microsoftonline.com/' . env('ONEDRIVE_TENANT_ID') . '/oauth2/v2.0/authorize?' . $query);


    }
}
