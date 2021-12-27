<?php

use Models\Applicant;
use Models\Vacancy;

spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once __DIR__ . DIRECTORY_SEPARATOR . $className . '.php';
});

$applicant1 = new Applicant('Петр Меньшов', 'petr@example.com', 3);
$applicant2 = new Applicant('Василий Капушов', 'vasya@example.com', 3);
$applicant3 = new Applicant('Калиноп Жучкин', '123@mail.com', 5);

$vacancy = new Vacancy();
$vacancy->subcribe($applicant1);
$vacancy->subcribe($applicant2);
$vacancy->subcribe($applicant3);
$vacancy->addVacancy('Первая вакансия');

echo '__________________' . PHP_EOL;

$vacancy->unsubscribe($applicant3);
$vacancy->addVacancy('Вторая вакансия');