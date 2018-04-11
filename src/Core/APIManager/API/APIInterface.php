<?php
namespace App\Core\APIManager\API;

/**
 * Interface APIInterface
 * Estrategia que distribuye la petición al procesador correspondiente.
 * 
 * @package App\Core\APIManager\API
 */
interface APIInterface
{
    public function getResponse();
}