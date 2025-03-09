<?php

/**
 * Valida que todos los parámetros requeridos estén presentes y no estén vacíos.
 *
 * @param array $requiredParams Lista de parámetros requeridos.
 * @param array $params Array con los parámetros a validar.
 * @return void Envía una respuesta de error si algún parámetro falta.
 */
function validate_required_params($requiredParams, $params) {
    $missingParams = [];

    foreach ($requiredParams as $param) {
        if (!isset($params[$param]) || empty($params[$param])) {
            $missingParams[] = $param;
        }
    }

    if (!empty($missingParams)) {
        return array(
            'estatus' =>false,
            'message' => 'Faltan los siguientes parámetros requeridos: ' . implode(', ', $missingParams)
        );
    }

    return true;
}

?>