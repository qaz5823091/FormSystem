<?php

namespace App\Controllers;

use App\View;
use App\Models\Database;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TestController
{
    public function test(Request $request, Response $response, $args): Response
    {
        $connect = Database::connect();
        $result = "";

        if ($connect != null) {
            $result = "yes";
        } else {
            $result = "no";
        }
        $response->getBody()->write($result);

        return $response;
    }
}
