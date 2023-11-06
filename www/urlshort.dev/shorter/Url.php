<?php

    namespace UrlShort;

    class Url implements InterfaceUrl
    {

        private $url;
        public function __construct($url)
        {
            $this->url = $url;
        }
        public function valid(): bool
        {
            return $this->regularValidation() && $this->curlValidation();
        }

        private function regularValidation()
        {
            $regular
                = "/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:\/?#[\]@!\$&'\(\)\*\+,;=.]+$/i";

            return preg_match($regular, $this->url);
        }

        private function curlValidation(): bool
        {
            $c = curl_init();
            curl_setopt($c, CURLOPT_URL, $this->url);
            curl_setopt($c, CURLOPT_HEADER, 1);
            curl_setopt($c, CURLOPT_NOBODY, 1);
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
            // ...

            $response = curl_exec($c);

            $trueUrl = curl_getinfo($c, CURLINFO_EFFECTIVE_URL);
            $this->url = $trueUrl;

            if (!$response) {
                return false;
            } else {
                return true;
            }
        }


        public function getUrl()
        {
            return $this->url;
        }

    }