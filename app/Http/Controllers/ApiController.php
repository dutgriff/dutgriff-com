<?php namespace DutGRIFF\Http\Controllers;

use DutGRIFF\Http\Controllers\Controller;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller {

    /**
     * @var int
     */

    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Respond
     *
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * Return Error
     *
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return Response::json([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode()
            ]
        ], $this->getStatusCode());
    }

    /**
     * Return a Not Found Error
     *
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = "Not Found.")
    {
       return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * Return a Failed Validation Error
     *
     * @param string $message
     * @return mixed
     */
    public function respondFailedValidation($message = "Parameter validation failed.")
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * Return Internal Error
     *
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = "Oops. Internal Error.")
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * Return created item
     *
     * @param $message
     * @param $objectData
     * @return mixed
     */
    public function respondCreated($objectData, $message = "Create Successful.")
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([
            'data' => [
                'item'   => $objectData
            ],
            'message' => $message
        ]);
    }

}
