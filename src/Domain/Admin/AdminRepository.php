<?php
declare(strict_types=1);

namespace App\Domain\Admin;


interface AdminRepository
{
    public function save(Admin $admin):Admin;

    public function findById(int $id):Admin;

    public function findByEmail(string $email):Admin;
}