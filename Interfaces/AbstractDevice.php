<?php

namespace Interfaces;

use Models\NetCard;

abstract class AbstractDevice implements Device
{
    /** @var NetCardInterface[]  */
    protected $netCards=[];

    public function addNetCard(NetCardInterface $netCard):self
    {
        $this->netCards[]=$netCard;
        return $this;
    }

    public function getMacAddress():string
    {
        $macAddresses=[];
        foreach ($this->netCards as $netCard) {
            $macAddresses[]=$netCard->getMacAddress();
        }
        return implode(', ',$macAddresses);
    }
}