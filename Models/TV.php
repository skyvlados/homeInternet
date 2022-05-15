<?php
namespace Models;
use Interfaces\AbstractDevice;

class TV extends AbstractDevice
{
    protected $model;
    protected $os;
    protected $fullHD;


    public function __construct($model, $os)
    {
        $this->model = $model;
        $this->os = $os;
    }

    public function withFullHD():self
    {
        $this->fullHD=true;
        return $this;
    }

    public function getTechnicalCharacteristics(): array
    {
        return [
            'Тип'=>'Телевизор',
            'Мак адрес'=>$this->getMacAddress(),
            'Модель'=>$this->model,
            'Операционная система'=>$this->os,
            'FULL HD'=>$this->fullHD?'Да':'Нет',
        ];
    }
}