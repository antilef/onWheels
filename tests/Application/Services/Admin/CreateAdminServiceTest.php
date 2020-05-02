<?php


namespace Tests\Application\Services\Admin;


use App\Application\Services\Admin\CreateAdminService;
use App\Infrastructure\Persistence\Admin\InMemoryAdminRepository;
use App\Infrastructure\Shared\BasicPasswordHash;
use Tests\TestCase;

class CreateAdminServiceTest extends TestCase
{
    private $createAdminService;


    protected function setUp()
    {
        $this->createAdminService = new CreateAdminService(new InMemoryAdminRepository(),new BasicPasswordHash());
    }


    public function testCreateCorrectAdminUser()
    {
        $user = $this->createAdminService->execute("Francisco","Antilef","saulsaul","example@gmail.com");
        $this->assertEquals("Francisco",$user->getName());
        $this->assertIsInt($user->getId());
    }

}