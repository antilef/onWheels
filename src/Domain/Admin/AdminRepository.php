<?php
declare(strict_types=1);

namespace App\Domain\Admin;


interface AdminRepository
{
    public function save();

    public function findById();

    public function findByEmail();
}