<?php

class VerijelasOcrResponseData
{


    /**
     * @var string $agama
     */
    protected $agama = null;

    /**
     * @var string $alamat
     */
    protected $alamat = null;

    /**
     * @var string $golDarah
     */
    protected $golDarah = null;

    /**
     * @var string $jenisKelamin
     */
    protected $jenisKelamin = null;

    /**
     * @var string $kecamatan
     */
    protected $kecamatan = null;

    /**
     * @var string $kelurahanDesa
     */
    protected $kelurahanDesa = null;

    /**
     * @var string $kewarganegaraan
     */
    protected $kewarganegaraan = null;

    /**
     * @var string $kota
     */
    protected $kota = null;

    /**
     * @var string $nama
     */
    protected $nama = null;

    /**
     * @var string $nik
     */
    protected $nik = null;

    /**
     * @var string $pekerjaan
     */
    protected $pekerjaan = null;

    /**
     * @var string $provinsi
     */
    protected $provinsi = null;

    /**
     * @var string $rtRw
     */
    protected $rtRw = null;

    /**
     * @var string $statusPerkawinan
     */
    protected $statusPerkawinan = null;

    /**
     * @var string $tanggalLahir
     */
    protected $tanggalLahir = null;

    /**
     * @var string $tempatLahir
     */
    protected $tempatLahir = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getAgama()
    {
      return $this->agama;
    }

    /**
     * @param string $agama
     * @return VerijelasOcrResponseData
     */
    public function setAgama($agama)
    {
      $this->agama = $agama;
      return $this;
    }

    /**
     * @return string
     */
    public function getAlamat()
    {
      return $this->alamat;
    }

    /**
     * @param string $alamat
     * @return VerijelasOcrResponseData
     */
    public function setAlamat($alamat)
    {
      $this->alamat = $alamat;
      return $this;
    }

    /**
     * @return string
     */
    public function getGolDarah()
    {
      return $this->golDarah;
    }

    /**
     * @param string $golDarah
     * @return VerijelasOcrResponseData
     */
    public function setGolDarah($golDarah)
    {
      $this->golDarah = $golDarah;
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
     * @return VerijelasOcrResponseData
     */
    public function setJenisKelamin($jenisKelamin)
    {
      $this->jenisKelamin = $jenisKelamin;
      return $this;
    }

    /**
     * @return string
     */
    public function getKecamatan()
    {
      return $this->kecamatan;
    }

    /**
     * @param string $kecamatan
     * @return VerijelasOcrResponseData
     */
    public function setKecamatan($kecamatan)
    {
      $this->kecamatan = $kecamatan;
      return $this;
    }

    /**
     * @return string
     */
    public function getKelurahanDesa()
    {
      return $this->kelurahanDesa;
    }

    /**
     * @param string $kelurahanDesa
     * @return VerijelasOcrResponseData
     */
    public function setKelurahanDesa($kelurahanDesa)
    {
      $this->kelurahanDesa = $kelurahanDesa;
      return $this;
    }

    /**
     * @return string
     */
    public function getKewarganegaraan()
    {
      return $this->kewarganegaraan;
    }

    /**
     * @param string $kewarganegaraan
     * @return VerijelasOcrResponseData
     */
    public function setKewarganegaraan($kewarganegaraan)
    {
      $this->kewarganegaraan = $kewarganegaraan;
      return $this;
    }

    /**
     * @return string
     */
    public function getKota()
    {
      return $this->kota;
    }

    /**
     * @param string $kota
     * @return VerijelasOcrResponseData
     */
    public function setKota($kota)
    {
      $this->kota = $kota;
      return $this;
    }

    /**
     * @return string
     */
    public function getNama()
    {
      return $this->nama;
    }

    /**
     * @param string $nama
     * @return VerijelasOcrResponseData
     */
    public function setNama($nama)
    {
      $this->nama = $nama;
      return $this;
    }

    /**
     * @return string
     */
    public function getNik()
    {
      return $this->nik;
    }

    /**
     * @param string $nik
     * @return VerijelasOcrResponseData
     */
    public function setNik($nik)
    {
      $this->nik = $nik;
      return $this;
    }

    /**
     * @return string
     */
    public function getPekerjaan()
    {
      return $this->pekerjaan;
    }

    /**
     * @param string $pekerjaan
     * @return VerijelasOcrResponseData
     */
    public function setPekerjaan($pekerjaan)
    {
      $this->pekerjaan = $pekerjaan;
      return $this;
    }

    /**
     * @return string
     */
    public function getProvinsi()
    {
      return $this->provinsi;
    }

    /**
     * @param string $provinsi
     * @return VerijelasOcrResponseData
     */
    public function setProvinsi($provinsi)
    {
      $this->provinsi = $provinsi;
      return $this;
    }

    /**
     * @return string
     */
    public function getRtRw()
    {
      return $this->rtRw;
    }

    /**
     * @param string $rtRw
     * @return VerijelasOcrResponseData
     */
    public function setRtRw($rtRw)
    {
      $this->rtRw = $rtRw;
      return $this;
    }

    /**
     * @return string
     */
    public function getStatusPerkawinan()
    {
      return $this->statusPerkawinan;
    }

    /**
     * @param string $statusPerkawinan
     * @return VerijelasOcrResponseData
     */
    public function setStatusPerkawinan($statusPerkawinan)
    {
      $this->statusPerkawinan = $statusPerkawinan;
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
     * @return VerijelasOcrResponseData
     */
    public function setTanggalLahir($tanggalLahir)
    {
      $this->tanggalLahir = $tanggalLahir;
      return $this;
    }

    /**
     * @return string
     */
    public function getTempatLahir()
    {
      return $this->tempatLahir;
    }

    /**
     * @param string $tempatLahir
     * @return VerijelasOcrResponseData
     */
    public function setTempatLahir($tempatLahir)
    {
      $this->tempatLahir = $tempatLahir;
      return $this;
    }

}
