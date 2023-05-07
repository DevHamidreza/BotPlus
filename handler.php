<?php
define('BASE',__DIR__);
require_once "Config/Config.php";
require_once "vendor/autoload.php";

use Zanzara\Zanzara;
use Zanzara\Context;

$telegram = new Zanzara($_CONFIG['TOKEN']);
$telegram->onMessage(function(Context $bot) use ($telegram,$_CONFIG){
    require_once "Bot/Message/User.php";
    if(in_array($bot->getMessage()->getChat()->getId(),$_CONFIG['ADMIN'])){
        require_once "Bot/Message/Admin.php";
    }
});
$telegram->onCbQuery(function(Context $bot)use ($telegram,$_CONFIG){
    require_once "Bot/CallBack/User.php";
    if(in_array($bot->getMessage()->getChat()->getId(),$_CONFIG['ADMIN'])){
        require_once "Bot/CallBack/Admin.php";
    }
});
$telegram->run();