<?php 

declare(strict_types=1);

namespace App\Middleware;
use Framework\Request;
use Framework\RequestHanlderInterface;
use Framework\Response;

class ChangeResponseExample
{
    public function process(Request $request,RequestHanlderInterface $next): Response
    {
        $response = $next->handle($request);

        $response->setBody($response->getBody() ."Hello World!");

        return $response;
    }
}