<?php


namespace App\Application\Services\Admin;


use App\Domain\Admin\AdminRepository;
use App\Domain\Employee\Admin;

class CreateAdminService
{


    /**
     * CreateAdminService constructor.
     * @param AdminRepository $adminRepository
     * @param PasswordHash $passwordHash
     */
    public function __construct(AdminRepository $adminRepository,PasswordHash $passwordHash)
    {
    }

    public function execute(string $name, string $surname, string $password, string $email):Admin{

    }

}