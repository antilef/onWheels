<?php


namespace App\Application\Services\Admin;


use App\Domain\Admin\AdminRepository;
use App\Domain\Employee\Admin;

class CreateAdminService
{

    private $adminRepository;
    private $passwordHash;

    /**
     * CreateAdminService constructor.
     * @param AdminRepository $adminRepository
     * @param PasswordHash $passwordHash
     */
    public function __construct(AdminRepository $adminRepository,PasswordHash $passwordHash)
    {
        $this->$adminRepository = $adminRepository;
        $this->$passwordHash = $passwordHash;
    }

    public function execute(string $name, string $surname, string $password, string $email):Admin {
        $hashPassword = $this->passwordHash->hash($password);
        $newAdmin = new Admin(null,$name,$surname,$hashPassword,$email);
        $newAdmin = $this->adminRepository->save($newAdmin);
        return $newAdmin;
    }

}