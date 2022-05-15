<?php
namespace Models;
use Interfaces\AbstractDevice;

class Phone extends AbstractDevice
{
    protected $model;
    protected $os;
    protected $gps;
    protected $fingerPrint;


    public function __construct($model, $os)
    {
        $this->model = $model;
        $this->os = $os;
    }

    public function withGPS():self
    {
        $this->gps=true;
        return $this;
    }

    public function withFingerPrint():self
    {
        $this->fingerPrint=true;
        return $this;
    }

    public function getTechnicalCharacteristics(): array
    {
        return [
            'Тип'=>'Телефон',
            'Мак адрес'=>$this->getMacAddress(),
            'Модель'=>$this->model,
            'Операционная система'=>$this->os,
            'Сенсор отпечатка пальцев'=>$this->fingerPrint?'Да':'Нет',
            'GPS'=>$this->gps?'Да':'Нет',

        ];
    }
}