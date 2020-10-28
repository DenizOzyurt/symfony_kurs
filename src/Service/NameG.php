<?php

namespace App\Service;

class NameG{
    public function randomNames(){
        $names=['AliCan','VeliCan','SelimCan','YeterCan','BudaSonCan'];
        $index=array_rand($names);
        return $names[$index];
    }
}
