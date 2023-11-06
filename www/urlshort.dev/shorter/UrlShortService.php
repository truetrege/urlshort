<?php

    namespace UrlShort;

    use UrlShort\exception\NotValidUrlException;
    use UrlShort\exception\ReservedShortNameException;
    use UrlShort\source\InterfaceRepository;

    class UrlShortService
    {
        private $repository;

        public function __construct(InterfaceRepository $repository)
        {
            $this->repository = $repository;
        }

        /**
         * @throws NotValidUrlException
         * @throws ReservedShortNameException
         */
        public function create(InterfaceUrl $url , $shortName=null): ShortUrl
        {
            if (!$url->valid()) {
                throw new NotValidUrlException();
            }
            if ($shortName && $this->repository->find($shortName) !== null) {
                throw new ReservedShortNameException();
            }

            $shortUrl = new \UrlShort\ShortUrl($url,new Short());
            if ($shortName) {
                $shortUrl->short()->setShort($shortName);
            }
            if ($shortUrl->short()->getShort() === null) {
                while ($shortUrl->short()->generate(8)) {
                    if ($this->repository->find($shortUrl->short()->getShort()) === null) {
                        break;
                    }
                }
            }
            $this->repository->create($shortUrl);
            return $shortUrl;
        }

        public function find($shortQuery)
        {
            return $this->repository->find($shortQuery);
        }

        public function delete()
        {
        }

        public function update()
        {
        }
    }