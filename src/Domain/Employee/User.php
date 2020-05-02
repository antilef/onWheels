<?php
declare(strict_types=1);

namespace App\Domain\Employee;

use JsonSerializable;

abstract class User implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $email;

    private $password;

    /**
     * @param int|null $id
     * @param string $name
     * @param string $surname
     * @param string $password
     * @param string $email
     * @throws PasswordTooShort
     */
    public function __construct(?int $id,string $name, string $surname, string $password, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $this->changePassword($password);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $password
     */
    protected function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
        ];
    }

    private function changePassword(string $password)
    {
        if(strlen($password)<8 ){
            throw new PasswordTooShort();
        }
        $this->setPassword($password);
    }
}
