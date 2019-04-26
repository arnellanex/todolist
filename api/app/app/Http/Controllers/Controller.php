<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function respondWithErrors(array $errors, int $errorCode, int $statusCode = 422)
    {
        $data = [
            'code'    => $errorCode,
            'message' => trans('errors.' . $errorCode)
        ];

        if ( ! empty($errors)) {
            $data['reason'] = $errors;
        }

        return $this->respond($data, $statusCode);
    }

    /**
     * Api Response
     *
     * @param  mixed $data
     * @param int    $statusCode
     * @param  array $headers
     * @return mixed
     */
    public function respond($data, int $statusCode = 200, array $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }
}
