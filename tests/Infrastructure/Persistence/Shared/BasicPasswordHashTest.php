<?php


namespace Tests\Infrastructure\Persistence\Shared;


use App\Infrastructure\Shared\BasicPasswordHash;
use Tests\TestCase;

class BasicPasswordHashTest extends TestCase
{
    private $passwordHash;

    protected function setUp()
    {
        $this->passwordHash = new BasicPasswordHash();
    }


    public function testCorrectHash()
    {
        $initial = $this->passwordHash->hash("Hello");
        $this->assertEquals($initial,$this->passwordHash->hash("Hello"));
    }

}