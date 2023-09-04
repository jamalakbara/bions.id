<?php

class RegisterEntityResponse
{

    /**
     * @var string $description
     */
    protected $description = null;

    /**
     * @var string $formNo
     */
    protected $formNo = null;

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
     * @return RegisterEntityResponse
     */
    public function setDescription($description)
    {
      $this->description = $description;
      return $this;
    }

    /**
     * @return string
     */
    public function getFormNo()
    {
      return $this->formNo;
    }

    /**
     * @param string $formNo
     * @return RegisterEntityResponse
     */
    public function setFormNo($formNo)
    {
      $this->formNo = $formNo;
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
     * @return RegisterEntityResponse
     */
    public function setResponse($response)
    {
      $this->response = $response;
      return $this;
    }

}
