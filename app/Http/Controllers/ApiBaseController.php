<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiBaseController extends Controller
{
    protected $baseUrl = null;

    public function __construct(string $baseUrl=null)
    {
        $this->baseUrl = $baseUrl ?? \Config::get('const.PROXY_BASE_URL');
    }

    protected function curl(string $url, string $method='GET')
    {
        \Log::debug('******** access url ********: ' . $url);
        $ch = curl_init($url);
        $options = [
            CURLOPT_RETURNTRANSFER => true,
        ];
        curl_setopt_array($ch, $options);
        $res = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($errno !== CURLE_OK) {
            return \Response::json("{'status' => '{$errno}', 'message' => '{$error}'}");
        }

        return \Response::json($res);

    }
}
