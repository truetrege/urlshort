<?php

    namespace app\c;

    class ErrorController
    {
        public static function notFound()
        {
            return view(['error' => 'Not Found Route'], 404);
        }
    }