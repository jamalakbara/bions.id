<?php

class PrintReport
{

    /**
     * @var string $regid
     */
    protected $regid = null;

    /**
     * @var string $lang
     */
    protected $lang = null;

    /**
     * @var string $formno
     */
    protected $formno = null;

    /**
     * @var string $email
     */
    protected $email = null;

    /**
     * @var string $branch
     */
    protected $branch = null;

    /**
     * @var string $source
     */
    protected $source = null;

    /**
     * @param string $regid
     * @param string $lang
     * @param string $formno
     * @param string $email
     * @param string $branch
     * @param string $source
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getRegid()
    {
      return $this->regid;
    }

    /**
     * @param string $regid
     * @return printReport
     */
    public function setRegid($regid)
    {
      $this->regid = $regid;
      return $this;
    }

    /**
     * @return string
     */
    public function getLang()
    {
      return $this->lang;
    }

    /**
     * @param string $lang
     * @return printReport
     */
    public function setLang($lang)
    {
      $this->lang = $lang;
      return $this;
    }

    /**
     * @return string
     */
    public function getFormno()
    {
      return $this->formno;
    }

    /**
     * @param string $formno
     * @return printReport
     */
    public function setFormno($formno)
    {
      $this->formno = $formno;
      return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
      return $this->email;
    }

    /**
     * @param string $email
     * @return printReport
     */
    public function setEmail($email)
    {
      $this->email = $email;
      return $this;
    }

    /**
     * @return string
     */
    public function getBranch()
    {
      return $this->branch;
    }

    /**
     * @param string $branch
     * @return printReport
     */
    public function setBranch($branch)
    {
      $this->branch = $branch;
      return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
      return $this->source;
    }

    /**
     * @param string $source
     * @return printReport
     */
    public function setSource($source)
    {
      $this->source = $source;
      return $this;
    }

}
