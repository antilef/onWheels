<?php
declare(strict_types=1);

namespace Tests\Domain\User;

use App\Domain\Employee\Employee;
use App\Domain\Employee\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function userProvider()
    {
        return [
            [1, 'bill.gates', 'Bill', 'GatesGates','example@onwheels.com'],
            [2, 'steve.jobs', 'Steve', 'JobsGates','example@onwheels.com'],
            [3, 'mark.zuckerberg', 'Mark', 'ZuckerbergGates','example@onwheels.com'],
            [4, 'evan.spiegel', 'Evan', 'SpiegelGates','example@onwheels.com'],
            [5, 'jack.dorsey', 'Jack', 'DorseyGates','example@onwheels.com'],
        ];
    }

    /**
     * @dataProvider userProvider
     * @param $id
     * @param $username
     * @param $surname
     * @param $password
     * @param $email
     * @throws \App\Domain\Employee\PasswordTooShort
     */
    public function testGetters($id, $username, $surname, $password, $email)
    {
        $user = new Employee($id, $username, $surname, $password,$email);
        $this->assertEquals($id, $user->getId());
        $this->assertEquals($username, $user->getName());
        $this->assertEquals($surname, $user->getSurname());
    }

    /**
     * @dataProvider userProvider
     * @param $id
     * @param $name
     * @param $surname
     * @param $password
     * @param $email
     * @throws \App\Domain\Employee\PasswordTooShort
     */
    public function testJsonSerialize($id, $name, $surname, $password, $email)
    {
        $user = new Employee($id, $name, $surname, $password,$email);

        $expectedPayload = json_encode([
            'id' => $id,
            'name' => $name,
            'surname' => $surname,
            'email' => $email
        ]);

        $this->assertEquals($expectedPayload, json_encode($user));
    }
}
