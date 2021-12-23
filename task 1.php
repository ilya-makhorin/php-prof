<?php

use App\Model\User;
use App\Services\EmailNotificationService;
use App\Services\SMSNotificationService;
use App\Vendor\SMSer;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$ivan = new User('Ivan', 'Ivan@email.ru', '+712345679');
$jake = new User('Jake', 'Jake@email.ru');

$notificationService = new EmailNotificationService();
$notificationService->notifyUser($ivan);
$notificationService->notifyUser($jake);
echo '__________________________' . PHP_EOL;
$notificationService = new SMSNotificationService(new SMSer(), $notificationService);
$notificationService->notifyUser($ivan);
$notificationService->notifyUser($jake);