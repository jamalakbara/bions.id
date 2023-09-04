<?php

class Login
{

    /**
     * @var string $p
     */
    protected $p = null;

    /**
     * @return string
     */
    public function getP()
    {
      return $this->p;
    }

    /**
     * @param string $p
     * @return login
     */
    public function setP($p)
    {
      $this->p = $p;
      return $this;
    }

}
