<?php
declare(strict_types=1);

use App\Application\Actions\Employee\ListEmployeeAction;
use App\Application\Actions\Employee\ViewEmployeeAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListEmployeeAction::class);
        $group->get('/{id}', ViewEmployeeAction::class);
    });
};
