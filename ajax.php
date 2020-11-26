<?php
require_once('../../config/config.inc.php');
require_once('../../init.php');
// echo rand(100,200);
$obj_mp = Module::getInstanceByName('multipurpose');
switch( Tools::getValue('action') ){

    case "ptable":
        $order = Tools::getValue('order',array());
        $columns = Tools::getValue('columns',array());
        $sortway = $order[0]['dir'];
        $sortby = $columns[$order[0]['column']]['data'];
        echo Tools::jsonEncode($obj_mp->loadProducts(Tools::getValue('start',0), Tools::getValue('length',5), $sortby, $sortway ));
    break;

    default:
        echo $obj_mp->getProductByCategoryID(Tools::getValue('id_category'));
        break;


}
die;