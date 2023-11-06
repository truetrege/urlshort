<?php

    namespace app\c;

    use UrlShort\exception\NotValidUrlException;
    use UrlShort\exception\ReservedShortNameException;
    use UrlShort\UrlShortService;

    class URLShortController
    {
        public static function redirect($arg)
        {
            $shortQuery = $arg[0];
            $shortService = new UrlShortService(new \UrlShort\source\UrlShortRepository(
                new \UrlShort\source\JsonUrlShortSource()
            ));
            $urlShort = $shortService->find($shortQuery);
            if ($urlShort) {
                return redirect($urlShort->url()->getUrl());
            }

            return view(['error' => 'not found short','short'=>$shortQuery], 404);
        }

        public static function all()
        {
            //return all
            return view(['success' => true, 'all' => 'coming soon']);
        }

        public static function update()
        {
            //update short return success or error
            return view(['success' => true, 'update' => 'coming soon']);
        }

        public static function delete()
        {
            //delete return success or error
            return view(['success' => true, 'delete' => 'coming soon']);
        }

        public static function get($arg)
        {
            $shortQuery = $arg[0];
            $shortService = new UrlShortService(new \UrlShort\source\UrlShortRepository(
                new \UrlShort\source\JsonUrlShortSource()
            ));
            $urlShort = $shortService->find($shortQuery);
            if ($urlShort) {
                return view([
                    'success' => true,
                    'short'   => $urlShort->short()
                        ->getShort(),
                    'url'   => $urlShort->url()
                        ->getUrl(),
                ]);
            }

            return view(['error' => 'not found short','short'=>$shortQuery], 404);
        }


        public static function add()
        {
            $shortRequest = request('short');
            $urlRequest   = request('url');

            $urlShortService = new UrlShortService(
                new \UrlShort\source\UrlShortRepository(
                    new \UrlShort\source\JsonUrlShortSource()
                )
            );
            try {
                $shortUrl = $urlShortService->create(
                    new \UrlShort\Url($urlRequest),
                    $shortRequest
                );
            } catch (NotValidUrlException $e) {
                return view(['error' => 'not valid url'], 400);
            } catch (ReservedShortNameException $e) {
                return view(['error' => 'short name reserved']);
            }

            return view([
                'success' => true,
                'short'   => $shortUrl->short()
                    ->getShort(),
                'url'   => $shortUrl->url()
                    ->getUrl(),
            ]);
        }
    }