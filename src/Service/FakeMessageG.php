<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\Response;

class FakeMessageG{
    /**
     * @param NameG $nameG
     * @return Response
     */
    public function fakeMessage(NameG $nameG){
        $message1=$nameG->randomNames();
        return new Response('This is FAKEMESSAGE   '.$message1);

//        trial is failed
    }
}