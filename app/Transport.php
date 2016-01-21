<?php

namespace App;

class Transport
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $plateNum;
    /**
     * @var float
     */
    private $statConsumption;
    /**
     * @var float
     */
    private $loadConsumption;
    /**
     * @var float
     */
    private $movingConsumption;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPlateNum()
    {
        return $this->plateNum;
    }

    /**
     * @param string $plateNum
     */
    public function setPlateNum($plateNum)
    {
        $this->plateNum = $plateNum;
    }

    /**
     * @return float
     */
    public function getStatConsumption()
    {
        return $this->statConsumption;
    }

    /**
     * @param float $statConsumption
     */
    public function setStatConsumption($statConsumption)
    {
        $this->statConsumption = $statConsumption;
    }

    /**
     * @return float
     */
    public function getLoadConsumption()
    {
        return $this->loadConsumption;
    }

    /**
     * @param float $loadConsumption
     */
    public function setLoadConsumption($loadConsumption)
    {
        $this->loadConsumption = $loadConsumption;
    }

    /**
     * @return float
     */
    public function getMovingConsumption()
    {
        return $this->movingConsumption;
    }

    /**
     * @param float $movingConsumption
     */
    public function setMovingConsumption($movingConsumption)
    {
        $this->movingConsumption = $movingConsumption;
    }

}