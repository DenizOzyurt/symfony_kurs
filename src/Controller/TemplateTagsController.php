<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class TemplateTagsController extends AbstractController
{
    /**
     * @Route ("/template-tags" , name="index")
     * @return Response
     */

    public function index()
    {

        //bu  sekilde template icinde bulun bir file eristik
         return $this->render("template-tags/index.html.twig",[
             'sehirler'=>[
                 'Antep',
                 'Istanbul',
                 'Izmir',
                 'Mugla',
             ],
             'ifVar'=>false,
             'definedCheck'=>'zese',
             'emptyCheck'=>false,
             'nullCheck'=>null,
             'num'=>11,
             'iterableCheck'=>['php','sym'],
         ]);
        //bir bundle icinde bulunan bir dosya icin @ isareti kullanacagiz

//        return $this->render("@Security/Collector/security.html.twig");

    }



}
