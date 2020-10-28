<?php

namespace App\Controller;

use App\Service\MessageG;
use App\Service\NameG;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HelloSynfony{
    /**
     * @Route ("/hello1")
     * @param MessageG $messageG
     */
    public function helloSynphony(MessageG $messageG){
//        1.way We used NameG as service
//        $message=$salut->randomNames();
//        return new Response('Welcome to synphony  '.$message);

//        2.way We used MessageG as servise
       return new Response($messageG->messageG());

    }
}