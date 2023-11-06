<?php

    namespace UrlShort\source;

    use UrlShort\InterfaceShort;
    use UrlShort\InterfaceShortUrl;
    use UrlShort\InterfaceUrl;

    class UrlShortRepository implements InterfaceRepository
    {

        private $source;

        public function __construct(InterfaceSource $source)
        {
            $this->source = $source;
        }

        /**
         * @param $short
         *
         * @return null|InterfaceShortUrl
         */
        public function find($short): ?InterfaceShortUrl
        {
            return $this->source->load($short);
        }

        public function update(InterfaceUrl $url, InterfaceShort $short)
        {
            $this->source->update($url->getUrl(), $short->getShort());
        }

        public function delete(InterfaceShort $short)
        {
            $this->source->delete($short->getShort());
        }

        public function create(InterfaceShortUrl $shortUrl)
        {
            return $this->source->save(
                $shortUrl->url()->getUrl(),
                $shortUrl->short()->getShort()
            );
        }

    }