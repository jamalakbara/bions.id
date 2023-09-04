<?php

class CheckDataFromDukcapil
{

    /**
     * @var string $nik
     */
    protected $nik = null;

    /**
     * @var string $tanggalLahir
     */
    protected $tanggalLahir = null;

    /**
     * @var string $jenisKelamin
     */
    protected $jenisKelamin = null;

    /**
     * @var string $noHp
     */
    protected $noHp = null;

    /**
     * @return string
     */
    public function getNik()
    {
      return $this->nik;
    }

    /**
     * @param string $nik
     * @return \checkDataFromDukcapil
     */
    public function setNik($nik)
    {
      $this->nik = $nik;
      return $this;
    }

    /**
     * @return string
     */
    public function getTanggalLahir()
    {
      return $this->tanggalLahir;
    }

    /**
     * @param string $tanggalLahir
     * @return \checkDataFromDukcapil
     */
    public function setTanggalLahir($tanggalLahir)
    {
      $this->tanggalLahir = $tanggalLahir;
      return $this;
    }

    /**
     * @return string
     */
    public function getJenisKelamin()
    {
      return $this->jenisKelamin;
    }

    /**
     * @param string $jenisKelamin
     * @return \checkDataFromDukcapil
     */
    public function setJenisKelamin($jenisKelamin)
    {
      $this->jenisKelamin = $jenisKelamin;
      return $this;
    }

    /**
     * @return string
     */
    public function getNoHp()
    {
      return $this->noHp;
    }

    /**
     * @param string $noHp
     * @return \checkDataFromDukcapil
     */
    public function setNoHp($noHp)
    {
      $this->noHp = $noHp;
      return $this;
    }

}
