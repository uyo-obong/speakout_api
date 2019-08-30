<?php

namespace Speakout\Modules;

use Uuid;

class BaseRepository{

    public function generateUuid()
    {
        return Uuid::generate(5,str_random(5), Uuid::NS_DNS);
    }

    public function slugIt($text)
    {
        return str_replace('--', '-', strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', trim($text))));  
    }

}