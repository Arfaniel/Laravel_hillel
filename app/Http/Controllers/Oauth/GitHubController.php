<?php

namespace App\Http\Controllers\Oauth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;

class GitHubController
{
    public function __invoke()
    {
        $code = request()->input('code'); //5db2bda9314797200eaf
        $url = 'https://github.com/login/oauth/access_token';
        $parameters = [
            'client_id' => config()->get('services.github.client_id'),
            'client_secret' => config()->get('services.github.client_secret'),
            'code' => $code
        ];
        $url .= '?' . http_build_query($parameters);
        $response = Http::post($url);
        if (!$response->ok()) {
            throw new Exception('error');
        }

        $data = [];
        parse_str($response->body(), $data);
        //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
        if (!isset($data['access_token'])) {
            return redirect()->route('main');
        }
        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . $data['access_token']
        ])->get('https://api.github.com/user');

        if (!$this->createUser($user->json())) {
            return redirect()->route('auth.login');
        }
        return redirect()->route('admin.panel');
    }

    /**
     * @param array $userInfo
     * @return bool
     */
    protected function createUser(array $userInfo): bool
    {
        if (!isset($userInfo['email'])) {
            if (!isset($userInfo['email'])) {
                return false;
            }
        }
        $user = User::where('email', $userInfo['email'])->first();
        if (empty($user)) {
            User::create([
                'role_name' => 'customer',
                'name' => $userInfo['name'],
                'email' => $userInfo['email'],
                'password' => Hash::make($userInfo['id'] . '_' . $userInfo['node_id'])
            ]);
        }
        Auth::login($user);
        return true;
    }
}
