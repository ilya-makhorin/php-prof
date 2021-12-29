<?php

use App\EntityManager\EntityManager;
use App\IdentityMap\IdentityMap;
use App\Mapper\UserMapper;
use App\Model\Repository\User;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$entityManager = new EntityManager(new IdentityMap(), new UserMapper(new User()));

$user1 = $entityManager->findById(\App\Model\Entity\User::class, 1);
echo "Под id 1 хранится пользователь {$user1->getName()}" . PHP_EOL;

$user2 = $entityManager->findById(\App\Model\Entity\User::class, 2);
echo "Под id 2 хранится пользователь {$user2->getName()}" . PHP_EOL;