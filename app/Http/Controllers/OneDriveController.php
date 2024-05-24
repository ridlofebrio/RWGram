<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

class OneDriveController extends Controller
{


    public function redirectToProvider()
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
    public function handleProviderCallback(Request $request)
    {

        // $request->validate([
        //     'code' => 'required'
        // ]);



        // $formParams = [
        //     'client_id' => env('ONEDRIVE_CLIENT_ID'),
        //     'client_secret' => env('ONEDRIVE_CLIENT_SECRET'),
        //     'code' => $request->code,
        //     'redirect_uri' => env('ONEDRIVE_REDIRECT_URI'),
        //     'grant_type' => 'authorization_code',
        // ];

        // Debug: Print form parameters

        // dd($formParams);
        $code = $request->query('code');



        try {
            $client = new Client();
            $response = $client->post('https://login.microsoftonline.com/' . env('ONEDRIVE_TENANT_ID') . '/oauth2/v2.0/token', [
                'form_params' => [
                    'client_id' => env('ONEDRIVE_CLIENT_ID'),
                    'client_secret' => env('ONEDRIVE_CLIENT_SECRET'),
                    'code' => $code,
                    'redirect_uri' => env('ONEDRIVE_REDIRECT_URI'),
                    'grant_type' => 'authorization_code',
                ],
            ]);

            $body = json_decode((string) $response->getBody(), true);
            $accessToken = $body['access_token'];

            session(['onedrive_access_token' => $accessToken]);

            return;
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Request failed',
                'message' => $e->getMessage()
            ], 400);
        }

    }
    public function upload(Request $request)
    {


        $accessToken = $request->session()->get('onedrive_access_token');
        $filePath = $request->file('file')->getPathname();
        $fileName = $request->file('file')->getClientOriginalName();
        $client = new Client();



        $response = $client->put('https://graph.microsoft.com/v1.0/me/drive/root:/rwgram/UMKM/' . $fileName . ':/content', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/octet-stream',
            ],
            'body' => fopen($filePath, 'r'),
        ]);



        $variabel = json_decode((string) $response->getBody(), true);
        return redirect($variabel['webUrl']);
    }
}
