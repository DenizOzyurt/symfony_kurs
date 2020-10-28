<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class TemplateFiltersController extends AbstractController
{
    /**
     * @Route ("/template-filters" , name="template_filters")
     * @return Response
     */

    public function index()
    {

        //bu  sekilde template icinde bulun bir file eristik
         return $this->render("template-filter/index.html.twig",[
             'negetiveVar'=>-25,
             'sentence'=>'merhaba ben dunyali',
             'sentence2'=>'   BU DA GECERR YA HU ',
             'date'=> new \DateTime(),
             'sehirler'=>['ali'=>'antep','can'=>'maras','veli'=>'lyon','sen'=>'str'],
             'rawData'=>'<h3> SELAM!!!  </h3>'
         ]);

    }



}
