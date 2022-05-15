<?php
namespace Models;
use Interfaces\AbstractDevice;

class PC extends AbstractDevice
{
    protected $model;
    protected $os;
    protected $hasTouchPad=false;

    public function __construct($model, $os)
    {
        $this->model = $model;
        $this->os = $os;
    }

    public function withTouchPad(): self
    {
        $this->hasTouchPad = true;
        return $this;
    }

    public function getTechnicalCharacteristics():array
    {
        return [
            'Тип'=>'Персональный компьютер',
            'Мак адрес'=>$this->getMacAddress(),
            'Модель'=>$this->model,
            'Операционная система'=>$this->os,
            'Тачпад'=>$this->hasTouchPad?'Да':'Нет',
        ];
    }
}