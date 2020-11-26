<?php
require_once('../../config/config.inc.php');
require_once('../../init.php');
// echo rand(100,200);
$obj_mp = Module::getInstanceByName('multipurpose');
echo $obj_mp->getProductByCategoryID(Tools::getValue('id_category'));
die;