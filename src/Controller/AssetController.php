<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssetController extends AbstractController
{
    /**
     * @Route ("/asset" , name="asset_control")
     * @return Response
     */

    public function index()
    {

        return $this->render('asset/index.html.twig');
    }

}
