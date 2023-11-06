<?php

    namespace app\c;

    class URLShortController
    {
        public static function redirect($arg)
        {
            $shortQuery = $arg[0];
            //found return redirect
            return view(['error' => 'not found short','short'=>$shortQuery], 404);
        }

        public static function all()
        {
            //return all
            return view(['success' => true, ]);

        }

        public static function update()
        {
            //update short return success or error
            return view(['success' => true, ]);
        }

        public static function delete()
        {
            //delete return success or error
            return view(['success' => true, ]);
        }

        public static function get()
        {
            //return json
            return view(['success' => true, ]);
        }


        public static function add()
        {
            $shortRequest = request('short');
            $urlRequest   = request('url');

            //create or return error
            return view(['success' => true, ]);
        }
    }