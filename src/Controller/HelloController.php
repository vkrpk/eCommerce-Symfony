<?php

namespace App\Controller;

use Twig\Environment;
use App\Taxes\Calculator;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    protected $calculator;

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }


    /**
     * @Route ("/hello/{prenom}", name="hello")
     */
    public function hello($prenom = "World", LoggerInterface $logger, Calculator $calculator, Slugify $slugify, Environment $twig)
    {

        dump($twig);

        $slugify = new Slugify();

        dump($slugify->slugify("Hello World"));

        $logger->error("Mon message de log !");

        $tva = $this->calculator->calcul(100);

        dump($tva);

        return new Response("Hello $prenom");
    }
}
