<?php

declare(strict_types=1);
namespace App\Domain\Bicycle;


class Bicycle implements \JsonSerializable
{
    private $id;

    private $model;

    private $brand;

    /**
     * Bicycle constructor.
     * @param $id
     * @param $model
     * @param $brand
     */
    public function __construct($id, $brand, $model)
    {
        $this->id = $id;
        $this->model = $model;
        $this->brand = $brand;
    }


    public function getId():int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getModel():string
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getBrand():string
    {
        return $this->brand;
    }



    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}