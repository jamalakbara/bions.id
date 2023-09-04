<?php

class RegisterForeign
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
     * @return \registerForeign
     */
    public function setP($p)
    {
      $this->p = $p;
      return $this;
    }

}
