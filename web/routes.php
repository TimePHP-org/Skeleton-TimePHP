<?php

use App\Bundle\Controllers\MainController;
use App\Bundle\Controllers\Rest\MainRestController;

return [
   [
      "method" => "get",
      "url" => "/",
      "name" => "home",
      "controller" => MainController::class,
      "function" => "mainFunction"
   ],
   [
      "method" => "get",
      "url" => "/slug/[s:slug]",
      "name" => "slug",
      "controller" => MainController::class,
      "function" => "mainFunction2"
   ],
   [
      "method" => "get",
      "url" => "/function/[i:test]",
      "name" => "function",
      "function" => function(int $test) {
         dd($test);
      }
   ],
   [
      "method" => "get",
      "url" => "/connexion",
      "name" => "connexion",
      "controller" => MainController::class,
      "function" => "connexion"
   ],
   [
      "method" => "get",
      "url" => "/deconnexion",
      "name" => "deconnexion",
      "controller" => MainController::class,
      "function" => "deconnexion"
   ],
   [
      "method" => "get",
      "url" => "/api/test",
      "name" => "api_test",
      "controller" => MainRestController::class,
      "function" => "mainRestFunction"
   ]
];