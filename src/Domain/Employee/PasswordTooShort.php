<?php


namespace App\Domain\Employee;


use App\Domain\DomainException\DomainException;

class PasswordTooShort extends DomainException
{
    public $message = 'The password is too short';
}