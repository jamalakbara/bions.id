<?php

class VerijelasOcrResponse
{

    /**
     * @var VerijelasOcrResponseData $data
     */
    protected $data = null;

    /**
     * @var string $errors
     */
    protected $errors = null;

    /**
     * @var string $refId
     */
    protected $refId = null;

    /**
     * @var int $status
     */
    protected $status = null;

    /**
     * @var int $timestamp
     */
    protected $timestamp = null;

    /**
     * @var string $trxId
     */
    protected $trxId = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return VerijelasOcrResponseData
     */
    public function getData()
    {
      return $this->data;
    }

    /**
     * @param VerijelasOcrResponseData $data
     * @return VerijelasOcrResponse
     */
    public function setData($data)
    {
      $this->data = $data;
      return $this;
    }

    /**
     * @return string
     */
    public function getErrors()
    {
      return $this->errors;
    }

    /**
     * @param string $errors
     * @return VerijelasOcrResponse
     */
    public function setErrors($errors)
    {
      $this->errors = $errors;
      return $this;
    }

    /**
     * @return string
     */
    public function getRefId()
    {
      return $this->refId;
    }

    /**
     * @param string $refId
     * @return VerijelasOcrResponse
     */
    public function setRefId($refId)
    {
      $this->refId = $refId;
      return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
      return $this->status;
    }

    /**
     * @param int $status
     * @return VerijelasOcrResponse
     */
    public function setStatus($status)
    {
      $this->status = $status;
      return $this;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
      return $this->timestamp;
    }

    /**
     * @param int $timestamp
     * @return VerijelasOcrResponse
     */
    public function setTimestamp($timestamp)
    {
      $this->timestamp = $timestamp;
      return $this;
    }

    /**
     * @return string
     */
    public function getTrxId()
    {
      return $this->trxId;
    }

    /**
     * @param string $trxId
     * @return VerijelasOcrResponse
     */
    public function setTrxId($trxId)
    {
      $this->trxId = $trxId;
      return $this;
    }

}
