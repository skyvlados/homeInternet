<?php
namespace Models;

use Interfaces\NetCardInterface;

class NetCard implements NetCardInterface
{
    protected $macAddress;
    protected $ip;
    protected $mask;


    public function __construct($macAddress, $ip, $mask)
    {
        $this->macAddress = $macAddress;
        $this->ip = $ip;
        $this->mask = $mask;
    }

    public function getMacAddress():string
    {
        return $this->macAddress;
    }

}