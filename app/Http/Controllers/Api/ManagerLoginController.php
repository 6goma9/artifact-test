<?php

namespace App\Http\Controllers\Api;

use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ManagerLoginController extends Controller
{
    /**
     * ログイン処理実行部
     *
     * @param Request $request
     * @return array
     */
    public function login(Request $request)
    {
        $manager = $this->isAuthenticated($request);
        Log::error($request->mail_address);
        Log::error($request->password);
        if ($manager === false) {
            $manager = $this->authenticate($request->mail_address, $request->password);
            if (array_key_exists('status', $manager)) return ['status' => 'not login'];
            $request->session()->regenerate();
            $request->session()->put('mail_address', $manager['mail_address']);
        }
        return $manager;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return [];
    }

    /**
     * すでに認証されているか確認する処理
     *
     * @param Request $request
     * @return mixed
     */
    protected function isAuthenticated(Request $request)
    {
        $mail_address = $request->session()->get('mail_address', null);
        return  $mail_address ? ['mail_address' => $mail_address] : false;
    }

    /**
     * 認証処理
     *
     * @param string $mail_address
     * @param string $password
     * @return array
     */
    protected function authenticate(string $mail_address, string $password)
    {
        $manager = Manager::where('mail_address', $mail_address)->first();
        Log::error(password_verify($password, $manager->password));
        return $manager && password_verify($password, $manager->password)
            ? ['mail_address' => $manager->mail_address]
            : ['status' => 'not login'];
    }
}
