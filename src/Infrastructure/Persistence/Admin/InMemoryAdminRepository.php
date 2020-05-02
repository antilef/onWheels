<?php


namespace App\Infrastructure\Persistence\Admin;


use App\Domain\Admin\AdminRepository;
use App\Domain\Admin\Admin;
use App\Domain\Employee\PasswordTooShort;
use App\Domain\Employee\UserNotFoundException;

class InMemoryAdminRepository implements AdminRepository
{
    private $admins;

    /**
     * InMemoryAdminRepository constructor.
     * @param Admin[] $admins
     * @throws PasswordTooShort
     */
    public function __construct()
    {
        $this->admins = [
                1 => new Admin(1, 'bill.gates', 'Bill', 'GatesGates',"example@onwheels.com")
            ];
    }


    public function save(Admin $admin):Admin
    {
        $id = count($this->admins)+1;
        $this->admins[$id] = $admin;
        return new Admin($id, $admin->getName(), $admin->getSurname(), $admin->getPassword(), $admin->getEmail());
    }

    public function findById(int $id):Admin
    {
        if (!isset($this->employees[$id])) {
            throw new UserNotFoundException();
        }

        return $this->employees[$id];
    }

    public function findByEmail(string $email):Admin
    {
        // TODO: Implement findByEmail() method.
    }
}