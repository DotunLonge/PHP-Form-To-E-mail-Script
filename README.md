PHP-Form-To-E-mail-Script

super simple to use class.

download entire repository,

probably rename the namespace in the php mailer from src/PHPMailer to whatever is convienient for you.

initialize the class like so:

```php
@include_once "FormHandler.php";

$handler = new FormHandler;

$handler->setYourEmail("your@email.com");
$handler->setSendToEmail ("to@email.com");
$handler->setYourPassword("xxxxxxx");
$handler->setFormData(["name"=>"longe", "age"=>"24","sex"=>"hot male"]);
$handler->send();

viola, you have a working mailer. 

Note: i made this to work only with google mail, so go figure.

thanks for checking it out.
```
