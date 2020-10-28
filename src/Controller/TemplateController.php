<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class TemplateController extends AbstractController
{
    /**
     * @Route ("/template" , name="index")
     * @return Response
     */

    public function index()
    {

        //bu  sekilde template icinde bulun bir file eristik
         return $this->render("template/index.html.twig");
        //bir bundle icinde bulunan bir dosya icin @ isareti kullanacagiz

//        return $this->render("@Security/Collector/security.html.twig");

    }



}
