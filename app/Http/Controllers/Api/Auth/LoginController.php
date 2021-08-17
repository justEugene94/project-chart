<?php

namespace App\Http\Controllers\Api\Auth;


use App\Http\Requests\Api\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginController
{
    protected AuthService $authService;

    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return response()->json([
            'result' => [
                'data' => $this->authService->authenticate($request, $request->username, $request->password),
                'message' => 'success'
                ]
        ], ResponseAlias::HTTP_OK);
    }
}
