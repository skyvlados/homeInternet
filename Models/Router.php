<?php
namespace Models;

use Builders\Builder;
use Interfaces\Device;

class Router
{
    private $devices=[];

    public function addDevice(Device $abstractDevice)
    {
        $this->devices[]=$abstractDevice;
    }

    /**
     * @return Device[]
     */
    public function getDevices()
    {
        return $this->devices;
    }
}