<?php

    namespace UrlShort;

    class Short implements InterfaceShort
    {
        private $short;
        public function __construct($short = null) {
            $this->short = $short;
        }

        public function getShort(){
            return $this->short;
        }
        public function setShort($short){
            $this->short = $short;
        }
        public function generate($length=8): string
        {
            $short = "";
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $charslen = strlen($chars);
            for ($i=0; $i<$length; $i++)
            {
                $rnd = rand(0, $charslen);
                $short .= substr($chars, $rnd, 1);
            }
            $this->short = $short;
            return $this->short;
        }
    }