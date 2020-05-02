<?php


namespace App\Domain\Shared;


interface PasswordHash
{
    public function hash(string $password): string;

}