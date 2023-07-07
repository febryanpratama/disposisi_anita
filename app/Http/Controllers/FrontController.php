<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    //
    public function indexLanding()
    {
        return view('layouts.base_front');
    }

    public function sendsms(Request $request)
    {
        $userkey = '59d153f6a599';
        $passkey = '695fdb3a186c34dca5d8255a';
        $telepon = $request['no_telpon'];
        $message = $request['messages'];
        // $url = 'https://console.zenziva.net/reguler/api/sendsms/';
        // $curlHandle = curl_init();
        // curl_setopt($curlHandle, CURLOPT_URL, $url);
        // curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        // curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        // curl_setopt($curlHandle, CURLOPT_POST, 1);
        // curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
        //     'userkey' => $userkey,
        //     'passkey' => $passkey,
        //     'to' => $telepon,
        //     'message' => $message
        // ));
        // $results = json_decode(curl_exec($curlHandle), true);
        // // dd($results);
        // curl_close($curlHandle);

        // return response()->json($results);

        $response = Http::post('https://console.zenziva.net/reguler/api/sendsms/', [
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => '088744882202',
            'message' => 'Haki Tessstt'
            // 'to' => $telepon,
            // 'message' => $message
        ]);

        return response()->json($response);
    }
}
