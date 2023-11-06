<?php

    namespace UrlShort\source;

    use UrlShort\Short;
    use UrlShort\ShortUrl;
    use UrlShort\Url;

    class JsonUrlShortSource implements InterfaceSource
    {
        private $storage = './short.json';
        private function getJson(){
            $file = file_get_contents($this->storage);

            return json_decode($file,true);
        }
        public function load($short): ?ShortUrl
        {
            $json = $this->getJson();
            if(isset($json[$short])){
                return new ShortUrl(new Url($json[$short]),new Short($short));
            }
            return null;
        }

        public function save($url, $short)
        {
            $json = $this->getJson();
            $json[$short] = $url;
            $new = json_encode($json);
            file_put_contents($this->storage, $new);
        }

        public function update($url, $short)
        {
            // TODO: Implement update() method.
        }

        public function delete($short)
        {
            // TODO: Implement delete() method.
        }
    }