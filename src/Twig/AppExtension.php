<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension{
 // class 'AbstractExtension' a extends etmezse twigfilter olarak algilamaz.
    // asagidaki functionla once istedigimiz functioni cagiriyoruz
    public function getFilters()
    {
        return[
            new TwigFilter('md5',[$this,'md5Filter']),
        ] ;
    }
//      yukrida cagirilan functiona ne yapacagini tanimladik
    //verilen filteri md% lenmis sekilde return yapsin dedik.
    public function md5Filter($string){
     return md5($string);
    }
}