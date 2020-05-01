<?php
declare(strict_types=1);

use App\Domain\Employee\EmployeeRepository;
use App\Infrastructure\Persistence\Employee\InMemoryEmployeeRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our EmployeeRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        EmployeeRepository::class => \DI\autowire(InMemoryEmployeeRepository::class),
    ]);
};
