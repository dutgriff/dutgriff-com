<?php namespace DutGRIFF\Http\Controllers;

use DutGRIFF\Http\Controllers\Controller;
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
        ]);
    }

    /**
     * Return a Not Found Error
     *
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = "Not Found.")
    {
       return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * Return Internal Error
     *
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = "Oops. Internal Error.")
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

}
