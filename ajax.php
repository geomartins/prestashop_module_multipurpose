<?php
require_once('../../config/config.inc.php');
require_once('../../init.php');
// echo rand(100,200);
$obj_mp = Module::getInstanceByName('multipurpose');
switch( Tools::getValue('action') ){

    case "ptable":
        echo Tools::jsonEncode($obj_mp->loadProducts(Tools::getValue('start',0), Tools::getValue('start',5) ));
    break;

    default:
        echo $obj_mp->getProductByCategoryID(Tools::getValue('id_category'));
        break;


}
die;