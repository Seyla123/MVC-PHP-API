<?php 

declare(strict_types=1);

namespace Framework;

interface RequestHanlderInterface
{
    public function handle(Request $request): Response;
}