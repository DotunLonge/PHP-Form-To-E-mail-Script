<?
@include_once "FormHandler.php";

$handler = new FormHandler;

$handler->setYourEmail("your@email.com");
$handler->setSendToEmail ("to@email.com");
$handler->setYourPassword("xxxxxxx");
$handler->setFormData(["name"=>"longe", "age"=>"24","sex"=>"hot male"]);
$handler->send();

?>