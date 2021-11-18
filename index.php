<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
require_once dirname(__DIR__).'/vendor/autoload.php';
$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');
$twig = new Environment($loader,[]);
$navigation =[
    ['caption'=>'first','img'=>'img/11.jpg','button'=>'first big size'],
    ['caption'=>'second','img'=>'img/17.jpg','button'=>'second big size']
];
$b =  [
    'title' => 'My first twig',
    'navigation' => $navigation,];
echo $twig->render('index.twig', $b
);
