<?php
/**
 *
 */
abstract class BaseResponse
{
    /**
     * @var object
     */
    protected $rawResponse;

    /**
     * @param object $rawResponse
     */
    public function __construct(object $rawResponse)
    {
        $this->rawResponse = $rawResponse;
        if ($rawResponse->status) {
            $this->rawResponse = $rawResponse->response;
        } else {
            $this->rawResponse->msg = $rawResponse->response;
        }
    }

    /**
     * @return object
     */
    public function getRawResponse(): object
    {
        return $this->rawResponse;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->rawResponse->status;
    }


    /**
     * @return string
     */
    public function getResponseMsg(): string
    {
        if ($this->rawResponse->msg === null) {
            return "something went wrong";
        }

        $msg = $this->rawResponse->msg;

        if (is_array($msg)) {
            return json_encode($msg);
        }

        return $msg;
    }
}
