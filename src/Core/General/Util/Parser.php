<?php

namespace App\Core\General\Util;


/**
 * Class Parser
 * @package App\Util
 * @author Ariel Belloc <arielbelloc@gmail.com>
 */
class Parser
{
    /**
     * Pasa un array a un stdClass en forma recursiva.
     *
     * @param $array
     * @param $levels (int) Cantidad de niveles a parsear
     * 
     * @return \stdClass
     */
    public static function arrayToObject(array $array, int $levels = NULL) : \stdClass
    {
        // Si llegué al límite de niveles, devuelvo array.
        if ($levels === 0) {
            throw new \InvalidArgumentException('El parámetro $levels debe ser mayor a cero');
        }

        // Si se asignó un número al parámetro $levels
        if (!is_null($levels)) {
            // Le resto 1.
            $levels = $levels-1;
        }

        $obj = new \stdClass();
        foreach($array as $k => $v) {
            if(strlen($k)) {
                if(is_array($v) && $levels !== 0) {
                    $obj->{$k} = self::arrayToObject($v, $levels); //RECURSION
                } else {
                    $obj->{$k} = $v;
                }
            }
        }
        return $obj;
    }

    /**
     * @param \stdClass $object
     * @return array
     */
    public static function objectToArray(\stdClass $object) : array
    {
        $array = json_decode(json_encode($object), true);
        return $array;
    }
}