<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RoutingController extends AbstractController{

    //iki farkli route ("/about","/hakkinda")  bir sayfaya(actiona) gidiyor.
    /**
     * @Route ({
     "en":"/about",
     *     "tr":"/hakkinda"
*     } , name="about")
     * @return JsonResponse
     */

    public function about()
    {
        return new JsonResponse(["message"=>"About and Hakkinda page"]);
    }

    /**
     //altta olan routa requirement ekledik \d+ integer olmak zorunda
     * @Route ("/blog/{page}", name="blog_listele", requirements={"page"="\d+"})
     * @param $page
     * @return Response
     */
    public function listele($page){
        return new Response("Page Integer:  ".$page);

    }

    /**
    //Requirements icin kisa yol
     * @Route ("/blog_listele/{page<\d+>}", name="blog_listele_3")
     * @param $page
     * @return Response
     */
    public function listele3($page){
        return new Response("Page Integer Shourtcut for requirements:  ".$page);

    }

// bir ustte olanla ayni ama ona integer sarti ekledik Stringler  postSllug a gelecek
    /**
     * @Route ("/blog/{postSlug}", name="blog_listele2")
     * @param $postSlug
     * @return Response
     */
    public function listele2($postSlug){
        return new Response("Post slug String:  ".$postSlug);

    }

    //sadece belirli variabler icin optionlar kullaniliyor. burada /tr ve /en disinda route calismayacak

    /**
     * @Route ("/routing/hello/{locale}",defaults={"locale"="tr"}, requirements={
     * "locale"="en|tr"     })
     */
    public function helloRouting($locale){
        return new Response("Belirli variable disinda(tr|en) hata mesaji  ".$locale);
    }

    //Sadece belirli requestleri kabul etmek icin(Post,Get,Put..)

    /**
     * @Route ("api/posts/{id}", methods={"GET", "HEAD"})
     */
    public function showPage($id){
        return new Response("Sadece belirli requestler icin:  ".$id );
        //burada POST ve PUT methodlarini yazarsak erreur aliriz cunku post ve put yapmiyoruz
    }
    //bunu test icin  php bin/console debug:router

    //route a defaoult variable verme islemi PHP method ile fonksiyonda yazdik
    /**
     * @Route("/posts/{page<\d+>}",name="post_listeleme")
     */
    public function postlisteleme($page=1){
        return new JsonResponse(["message default variable with function"=>$page]);
    }

    //Default variable routing icinde verdik.
    /**
     * @Route("/post-defualtrouting/{page<\d+>?33}",name="post_listeleme_yeni")
     */
    public function postlisteleme2($page){
        return new JsonResponse(["message default variable with routing"=>$page]);
    }

    //GELISMIS ROUTING ORNEGI

    /**
     * @Route ("/makaleler/{_locale}/{yil}/{slug}.{_format}",
     *     defaults={"_format"="html"},
     *     requirements={
     *     "_locale"="en|tr",
     *     "_format"="html|json",
     *     "yil"="\d+"
     *     })
     * @return JsonResponse
     */
    public function showMakale($_locale,$yil,$slug,$_format){
        return new JsonResponse(["message ADVANCED ROUTE INTANCE "=>implode("---",
        [$_locale, $yil, $slug, $_format])]);
        //implode komutunda konulan string tum degiskenlerin arasina giriyor
//        return new Response("new Advanced Route Instance" =>implode("----",
//            [$_locale,$_format,$yil,$slug  ]));
    }
        //URL uretme 1.WAY
    /**
     * @Route("/generate-url")
     */
    public function urlUret(){
       //generateUrl de olan name i php bin/console debug:router ile bulduk
        $url=$this->generateUrl("app_routing_showmakale",[
            '_locale'=>'tr',
            '_format'=>'json',
            'yil'=>2021,
            'slug'=>'ins hersey yoluna girir!!!!'
        ]);
        return new JsonResponse(["Generate URL"=>$url]);
    }

    //URL uretme 2.WAY
    /**
     * @Route("/generate-url-servis")
     */
    public function urlUret2(UrlGeneratorInterface $router){
        //generateUrl de olan name php bin/console debug:router ile bulduk
        $url=$router->generate("app_routing_showmakale",[
            '_locale'=>'tr',
            '_format'=>'json',
            'yil'=>2021,
            'slug'=>'ins hersey yoluna girir_YENI_URL_URETME !!!!'
        ]);
        return new JsonResponse(["Generate URL"=>$url]);
    }

    //Generate URL3 name ile uretme
    /**
     * @Route("/generate-url-name")
     */
    public function urlUret3(){
        //generateUrl de olan name php bin/console debug:router ile bulduk
        //page den sonra olan kisimlari ekleyerek ne aradimizi netlestirmis olduk
        // 3. parametre olarak "UrlGeneratorInterface" bize verecegi URL turunu belirleyebiliyoruz
        $url=$this->generateUrl("post_listeleme_yeni",[
            'page'=>'99',
            ]);


        $fullurl=$this->generateUrl("post_listeleme_yeni",[
           'page'=>'99',
            'category'=>'health',
            'age'=>25,
            'height'=>170
        ],UrlGeneratorInterface::RELATIVE_PATH);


        return new JsonResponse(["Generate URL"=>$url , "Full URL: "=> $fullurl]);
    }


}
