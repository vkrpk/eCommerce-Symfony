<?php

namespace App\Controller;

use Twig\Environment;
use App\Taxes\Calculator;
use App\Taxes\Detector;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    protected $calculator;
    protected $detector;

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }


    /**
     * @Route ("/hello/{prenom}", name="hello")
     */
    public function hello($prenom = "World", LoggerInterface $logger, Calculator $calculator, Slugify $slugify, Environment $twig, Detector $detector)
    {

        // dump($detector->detect(101));
        // dump($detector->detect(99));

        // dump($twig);

        $slugify = new Slugify();

        // dump($slugify->slugify("Hello World"));

        $logger->error("Mon message de log !");

        $tva = $this->calculator->calcul(100);

        // dump($tva);

        return new Response("Hello $prenom");
    }
}
