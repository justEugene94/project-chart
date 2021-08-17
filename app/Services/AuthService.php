<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Mixed_;

class AuthService
{
    /** @var Client */
    protected Client $client;

    /** @var array|mixed */
    protected array $credentials;

    /** @var string */
    protected $url;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->credentials = config('auth.passport.grant.password');
        $this->url = config('app.url');
    }

    /**
     * @param Request $request
     * @param string $username
     * @param string $password
     * @return mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function authenticate(Request $request, string $username, string $password): Mixed_
    {
        $response = $this->client->post("{$this->url}/oauth/token", [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $this->credentials['client_id'],
                'client_secret' => $this->credentials['client_secret'],
                'username' => $username,
                'password' => $password,
                'scope' => '*',
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
