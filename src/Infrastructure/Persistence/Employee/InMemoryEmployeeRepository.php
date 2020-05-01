<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Employee;

use App\Domain\Employee\Employee;
use App\Domain\Employee\User;
use App\Domain\Employee\UserNotFoundException;
use App\Domain\Employee\EmployeeRepository;

class InMemoryEmployeeRepository implements EmployeeRepository
{
    /**
     * @var User[]
     */
    private $users;

    /**
     * InMemoryEmployeeRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $users = null)
    {
        $this->users = $users ?? [
            1 => new Employee(1, 'bill.gates', 'Bill', 'Gates'),
            2 => new Employee(2, 'steve.jobs', 'Steve', 'Jobs'),
            3 => new Employee(3, 'mark.zuckerberg', 'Mark', 'Zuckerberg'),
            4 => new Employee(4, 'evan.spiegel', 'Evan', 'Spiegel'),
            5 => new Employee(5, 'jack.dorsey', 'Jack', 'Dorsey'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->users);
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): User
    {
        if (!isset($this->users[$id])) {
            throw new UserNotFoundException();
        }

        return $this->users[$id];
    }
}
