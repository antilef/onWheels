<?php
declare(strict_types=1);

namespace Tests\Infrastructure\Persistence\User;

use App\Domain\Employee\Employee;
use App\Domain\Employee\User;
use App\Domain\Employee\UserNotFoundException;
use App\Infrastructure\Persistence\Employee\InMemoryEmployeeRepository;
use Tests\TestCase;

class InMemoryUserRepositoryTest extends TestCase
{
    public function testFindAll()
    {
        $user = new Employee(1, 'bill.gates', 'Bill', 'Gates');

        $userRepository = new InMemoryEmployeeRepository([1 => $user]);

        $this->assertEquals([$user], $userRepository->findAll());
    }

    public function testFindUserOfId()
    {
        $user = new Employee(1, 'bill.gates', 'Bill', 'Gates');

        $userRepository = new InMemoryEmployeeRepository([1 => $user]);

        $this->assertEquals($user, $userRepository->findUserOfId(1));
    }

    public function testFindUserOfIdThrowsNotFoundException()
    {
        $this->expectException(\App\Domain\Employee\UserNotFoundException::class);
        $userRepository = new InMemoryEmployeeRepository([]);
        $userRepository->findUserOfId(1);
    }
}
