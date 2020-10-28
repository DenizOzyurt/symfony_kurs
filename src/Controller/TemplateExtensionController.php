<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class TemplateExtensionController extends AbstractController
{
    /**
     * @Route ("/template-extension" , name="template_extention")
     * @return Response
     */

    public function index()
    {

        //Yeni bir filter nasil olusturulur
        // 1.src da once yeni bir directory olusturduk Twig diye sonra orada bir file
        // olusturup onun icine yeni filteri ekledik

         return $this->render("template-extension/index.html.twig",[
            'sentence'=>'Yeni bir filter ekleme nasil olur!!!! '
    ]);


    }



}
