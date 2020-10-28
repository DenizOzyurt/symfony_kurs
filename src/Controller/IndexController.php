<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route ("/" , name="index")
     * @return Response
     */

    public function index()
    {
      //sonucu text olarak donduk
        //  return new Response('Hello World!');

        //sonucu template olarak donecegiz
//        return $this->render("index/index.html.twig",["controller_name"=>"IndexController"]);

        //sonucu Json olarak donecegiz
        return new JsonResponse(['message1'=>'Hello World','message2'=>'This is my first synphony course']);
    }

    /**
     * @Route ("/request" , name="requestTest")
     * @param RequestStack $requestStack
     * @return Response
     */
    public function requestTest(RequestStack $requestStack){

        $request=$requestStack->getCurrentRequest();

        //$_POST la yapilan tum islemleri
        $name=$request->request->get('name');

        //$_GET ile yapilan islemmler
        //get() can put default value
        $name=$request->query->get('name');
      //  $name=$request->query->get('name','osman');

        var_dump($name);exit();
        //cookies ler icinde
        $request->cookies->get('username');

        //attributes(uygulama icinde olan parametrelere ulasmaya yarayan farkli bir yapi) ler icinde
       $request->attributes->get('name');


        //$_FILES  dosya yukleme icin
        $request->files->get('filename');

        //$_SERVER icinde
        //tum bilgeler icin all
          $serverData=$request->server->all();

        //belirle bilgiler icin
        $serverData=$request->server->get('MYSQL_HOME');

        //$_HEADERS header lari almak icin
        $headers=$request->headers->all();
//        var_dump($headers);exit();


        //cikan sayfada page source deyince bilgiler duzenli olarak cikiyor.
        var_dump($serverData); exit();


    }


    /**
     * @Route ("/response" , name="responseTest")
     * @param RequestStack $requestStack
     * @return Response
     */
    public function responseTest(RequestStack $requestStack){

//      return new Response('hello Strasbourg');
      //return  $this->render('');
        return new JsonResponse(['message'=>'kursun bitmesine daha cok var']);
        return $this->redirectToRoute('requestTest');

    }

    /**
     * @Route ("/service",name="serviceTest")
     * @param SessionInterface $session
     * @return Response
     */
    public function serviceTest(SessionInterface  $session) {
           return new Response($session->getName());
    }
//    public function serviceTest(){
//     //   $name=$this->session->container->get('session');
//       $name=$this->container->get('session');
//        return new Response($name);
//    }

}
