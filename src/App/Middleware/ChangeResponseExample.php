<?php 

declare(strict_types=1);

namespace App\Middleware;
use Framework\Request;
class ChangeResponseExample
{
    public function process(Request $request, $next): Response
    {
        $response = $next->handle($request);

        $response->setBody($response->getBody() ."Hello World!");

        return $response;
    }
}