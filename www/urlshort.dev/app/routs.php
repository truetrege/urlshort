<?php
    return [
        'GET'    => [
            '/api/url/short/(\w.*)' => 'app\\c\\URLShortController::get',
            '/api/url/short'         => 'app\\c\\URLShortController::all',
            '\/(\w.*)'              => 'app\\c\\URLShortController::redirect',
        ],
        'POST'   => [
            '/api/url/short' => 'app\\c\\URLShortController::add',
        ],
        'PATCH'  => [
            '/api/url/short' => 'app\\c\\URLShortController::update',
        ],
        'DELETE' => [
            '/api/url/short' => 'app\\c\\URLShortController::delete',
        ],
        '_ERROR'=>[
            '_error'=>"app\\c\\ErrorController::notFound"
        ]
    ];