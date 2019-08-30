<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class Common 
{
    public function formatDate($date)
    {
        return  Carbon::parse($date)->format('Y-m-d\TH:i:s.vP');
    }
   
    public function generateUuid()
    {
        return Uuid::generate(5,str_random(10), Uuid::NS_DNS);;
    }




}