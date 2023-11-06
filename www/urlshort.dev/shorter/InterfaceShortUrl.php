<?php

    namespace UrlShort;

    interface InterfaceShortUrl
    {
        public function url():InterfaceUrl;
        public function short():InterfaceShort;
    }