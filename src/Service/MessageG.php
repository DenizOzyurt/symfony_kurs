<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

class MessageG{

    /**
     * @var NameG
     */
    private $nameG;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var string
     */
    private $adminMail;
    public function __construct(NameG $nameG,RequestStack $requestStack,$adminMail){
     $this->nameG=$nameG;
     $this->requestStack=$requestStack;
     $this->adminMail=$adminMail;
    }

    public function messageG(){
    $name=$this->requestStack->getCurrentRequest()->get('name');

    If(empty($name)){
    $name=$this->nameG->randomNames();}
    $mail=$this->adminMail;

    return new Response('This from messageG '.$name.'  This is urgent mail : ' .$mail);
    }
}