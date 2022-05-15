<!--для запуска программы необходимо выполнить в терминале php -S localhost:8000-->
Список устройств подключенных к роутеру
<?php
require_once 'vendor/autoload.php';

use Models\PC;
use Models\NetCard;
use Models\Phone;
use Models\Router;
use Models\TV;
use Models\WifiCard;

$netCard1=new NetCard('00:00:5e:00:53:aa','0.0.0.1', '255.255.255.0');
$netCard2=new NetCard('00:00:5e:00:53:bb','0.0.0.2', '255.255.255.1');
$wifi1=new WifiCard('00:00:5e:00:53:cc','0.0.0.3', '255.255.255.2');
$wifi2=new WifiCard('00:00:5e:00:53:dd','0.0.0.4', '255.255.255.3');
$wifi3=new WifiCard('00:00:5e:00:53:ee','0.0.0.5', '255.255.255.4');

$pc1=new PC('Intel Pentium 4', 'Windows XP');
$pc1->addNetCard($netCard1)->withTouchPad()->addNetCard($wifi1);
$pc2=new PC('Intel Core 2', 'Linux');
$pc2->addNetCard($wifi1);
$phone=new Phone('Nokia', 'Symbian');
$phone->addNetCard($wifi2)->withGPS()->withFingerPrint();
$tv=new TV('Samsung', 'Android');
$tv->addNetCard($netCard2)->addNetCard($wifi3)->withFullHD();

//pc1, pc2, phone, tv
$router=new Router();
$router->addDevice($pc1);
$router->addDevice($pc2);
$router->addDevice($phone);
$router->addDevice($tv);
$devices=$router->getDevices();

?>
<html>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<table border-collapse>
    <tr>
        <th>Номер устройства</th>
        <th>Тип устройства</th>
        <th>Характеристика</th>
        <th>Значение</th>
    </tr>
<?php foreach ($devices as $index=>$device) {?>
        <tr>
            <td><?= ($index+1)?></td>
        </tr>
    <?php foreach ($device->getTechnicalCharacteristics() as $key => $value) {?>
        <tr>
            <td></td>
            <td><?=(!strcmp($key,'Тип')) ? $value : ''?></td>
            <td><?=(strcmp($key,'Тип')) ? $key : ''?></td>
            <td><?=(strcmp($key,'Тип')) ? $value : ''?></td>
        </tr>
    <?php }
}?>
</table>
</html>