<?php 
use Zanzara\Context;
$telegram->onCommand("start", function (Context $bot) {
    $bot->sendMessage("Hi, what's your name?");
    $bot->nextStep("checkName");
});

function checkName(Context $bot)
{
    $name = $bot->getMessage()->getText();
    $bot->setUserDataItem('name', $name);
    $bot->sendMessage("Hi $name, what is your age?");
    $bot->nextStep("checkAge");
}

function checkAge(Context $bot)
{
    $age = $bot->getMessage()->getText();
    if (ctype_digit($age)) {
        $bot->getUserDataItem('name')->then(function ($name) use ($bot) {
            // ... save user data on MySql
            $bot->sendMessage("Ok $name perfect, bye");
            $bot->endConversation(); // clean the state for this conversation
        });
    } else {
        $bot->sendMessage("Must be a number, retry");
    }
}