<?php

    namespace UrlShort\source;

    use UrlShort\InterfaceShort;
    use UrlShort\InterfaceShortUrl;
    use UrlShort\InterfaceUrl;

    interface InterfaceRepository
    {
        public function __construct(InterfaceSource $source);
        public function find($short);
        public function update(InterfaceUrl $url,InterfaceShort $short);
        public function delete(InterfaceShort $short);
        public function create(InterfaceShortUrl $shortUrl);
    }