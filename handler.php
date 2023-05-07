<?php
define('BASE',__DIR__);
require_once "vendor/autoload.php";
require_once "Config/Config.php";

use Zanzara\Zanzara;
use Zanzara\Context;

$bot = new Zanzara($_CONFIG['TOKEN']);

$bot->onCommand("start", function (Context $ctx) {
    $ctx->sendMessage("Hi, what's your name?");
    $ctx->nextStep("checkName");
});

function checkName(Context $ctx)
{
    $name = $ctx->getMessage()->getText();
    $ctx->setUserDataItem('name', $name);
    $ctx->sendMessage("Hi $name, what is your age?");
    $ctx->nextStep("checkAge");
}

function checkAge(Context $ctx)
{
    $age = $ctx->getMessage()->getText();
    if (ctype_digit($age)) {
        $ctx->getUserDataItem('name')->then(function ($name) use ($ctx) {
            // ... save user data on MySql
            $ctx->sendMessage("Ok $name perfect, bye");
            $ctx->endConversation(); // clean the state for this conversation
        });
    } else {
        $ctx->sendMessage("Must be a number, retry");
    }
}
$bot->run();