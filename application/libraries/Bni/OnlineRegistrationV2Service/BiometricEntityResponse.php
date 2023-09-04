<?php

class BiometricEntityResponse
{

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
     * @return string
     */
    public function getDescription()
    {
      return $this->description;
    }

    /**
     * @param string $description
     * @return BiometricEntityResponse
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
     * @return BiometricEntityResponse
     */
    public function setResponse($response)
    {
      $this->response = $response;
      return $this;
    }

}
