<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse as VerifyEmailViewResponseContract;

use Symfony\Component\HttpFoundation\Response;

class VerifyEmailViewResponse implements VerifyEmailViewResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function toResponse($request)
    {

    }
}
