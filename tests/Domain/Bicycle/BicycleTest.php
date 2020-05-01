<?php


namespace Tests\Domain\Bicycle;


use App\Domain\Bicycle\Bicycle;
use Tests\TestCase;

class BicycleTest extends TestCase
{
    public function testSetters()
    {
        $bicycle = new Bicycle(1,"oxford","MERAK 1");
        $this->assertEquals(1,$bicycle->getId());
        $this->assertEquals("oxford",$bicycle->getBrand());
        $this->assertEquals("MERAK 1",$bicycle->getModel());
    }
}