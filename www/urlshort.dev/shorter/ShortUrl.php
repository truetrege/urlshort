<?php

    namespace UrlShort;

    class ShortUrl implements InterfaceShortUrl
    {
        private $url;
        private $short;
        public function __construct(InterfaceUrl $url, InterfaceShort $short) {
            $this->url = $url;
            $this->short = $short;
        }

        public function url(): InterfaceUrl
        {
            return $this->url;
        }

        public function short(): InterfaceShort
        {
            return $this->short;
        }
    }