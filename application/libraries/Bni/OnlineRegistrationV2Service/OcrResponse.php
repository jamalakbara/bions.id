<?php

class OcrResponse
{

    /**
     * @var VerijelasOcrResponse $data
     */
    protected $data = null;

    /**
     * @var string $description
     */
    protected $description = null;

    /**
     * @var string $response
     */
    protected $response = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return VerijelasOcrResponse
     */
    public function getData()
    {
      return $this->data;
    }

    /**
     * @param VerijelasOcrResponse $data
     * @return OcrResponse
     */
    public function setData($data)
    {
      $this->data = $data;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
      return $this->description;
    }

    /**
     * @param string $description
     * @return OcrResponse
     */
    public function setDescription($description)
    {
      $this->description = $description;
      return $this;
    }

    /**
     * @return string
     */
    public function getResponse()
    {
      return $this->response;
    }

    /**
     * @param string $response
     * @return OcrResponse
     */
    public function setResponse($response)
    {
      $this->response = $response;
      return $this;
    }

}
