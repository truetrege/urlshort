<?php

    namespace UrlShort\source;

    interface InterfaceSource
    {
        public function load($short);
        public function save($url,$short);
        public function update($url,$short);
        public function delete($short);
    }