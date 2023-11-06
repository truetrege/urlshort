<?php

    namespace UrlShort;

    interface InterfaceShort
    {
        public function getShort();
        public function setShort($short);
        public function generate($length);
    }