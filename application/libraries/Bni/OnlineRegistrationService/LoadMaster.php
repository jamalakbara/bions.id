<?php

class LoadMaster
{

    /**
     * @var int $type
     */
    protected $type = null;

    /**
     * @var string $p
     */
    protected $p = null;


    /**
     * @return int
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param int $type
     * @return \loadMaster
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

    /**
     * @return string
     */
    public function getP()
    {
      return $this->p;
    }

    /**
     * @param string $p
     * @return \loadMaster
     */
    public function setP($p)
    {
      $this->p = $p;
      return $this;
    }

}
