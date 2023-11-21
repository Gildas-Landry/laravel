<?php

require __DIR__ . '../vendor/autoload.php';
$app= require_once __DIR__ . '../bootstrap/app.php';

$kernel =$app->make(Illuminatte\Contracts\Htp\kernel::class);
$response= $kernel->handle(
    $request=Illuminate\Http\Request::capture()
);
$reponse->send();
$kernel->terminate($request, $response);
