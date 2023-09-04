<?php

class Inquiry
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
     * @return \inquiry
     */
    public function setP($p)
    {
      $this->p = $p;
      return $this;
    }

}
