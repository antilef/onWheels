<?php


namespace App\Infrastructure\Shared;


use App\Domain\Shared\PasswordHash;

class BasicPasswordHash implements PasswordHash
{

    /**
     * @param string $password
     */
    public function hash(string $password): string
    {
        return hash('md5',$password);
    }
}