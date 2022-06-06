<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\Info( title="API DOC BOLSA DE TRABAJO UFG", version="1.0",
     *   description="Apis para la administracion de empresas de Arte"
     * ),
     * @OA\SecurityScheme(
     *      securityScheme="token",
     *      type="apiKey",
     *      name="Authorization",
     *      in="header"
     *     ),
     */
}
