    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center">
                        <h3 class="title">Kalkulator Investasi</h3>
                        <ul class="nav nav-pills" id="pills-tab-2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-a-tab" data-toggle="pill" href="#pills-a" role="tab" aria-controls="pills-a" aria-selected="true">Capital Gain Loss</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-b-tab" data-toggle="pill" href="#pills-b" role="tab" aria-controls="pills-b" aria-selected="false">Fibonaci Pivot</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-c-tab" data-toggle="pill" href="#pills-c" role="tab" aria-controls="pills-c" aria-selected="false">Target Investasi</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-d-tab" data-toggle="pill" href="#pills-d" role="tab" aria-controls="pills-d" aria-selected="false">Modal Investasi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent-2">

                        <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">
                            <div class="faq-accordion">
                                <div class="accrodion-grp"  data-grp-name="faq-accrodion">
                                    <div class="accrodion active  animated wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                                        <div class="accrodion-inner">
                                            <!--<div class="accrodion-title">
                                                <h4>Capital Gain Loss</h4>
                                            </div>-->
                                            <div class="accrodion-content">
                                                <div class="inner">
						<div class="row">
							<label class="col-lg-7">Harga Beli Saham per Lembar</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="cgbeli" name="cgbeli" value="5000">
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Jumlah Saham yang dibeli (Lot)</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="cglotbeli" name="cglotbeli" value="1">
									<div class="input-group-append">
									<span class="input-group-text">Lot</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal">Fee Beli Saham</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="cgfeebeli" name="cgfeebeli" value="0.17">
									<div class="input-group-append">
									<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Nilai bersih pembelian</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="cgnilaibeli" name="cgnilaibeli" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Harga Jual Saham per Lembar</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="cgjual" name="cgjual" value="5200">
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Jumlah Saham yang dijual (Lot)</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="cglotjual" name="cglotjual" value="1">
									<div class="input-group-append">
									<span class="input-group-text">Lot</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal">Fee Jual Saham</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="cgfeejual" name="cgfeejual" value="0.27">
									<div class="input-group-append">
									<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Nilai bersih penjualan</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="cgnilaijual" name="cgnilaijual" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Capital Gain/Loss</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="cgloss" name="cgloss" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<a style="color: #ffffff" class="btn btn-primary pull-right" onclick="hitungcg()";">HITUNG</a>
                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-b" role="tabpanel" aria-labelledby="pills-b-tab">
                            <div class="faq-accordion">
                                <div class="accrodion-grp"  data-grp-name="faq-accrodion">
                                    <div class="accrodion active  animated wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                                        <div class="accrodion-inner">
                                            <div class="accrodion-title">
                                                <h4>Fibonaci Pivot</h4>
                                            </div>
                                            <div class="accrodion-content">
                                                <div class="inner">
						<div class="row">
							<label class="col-lg-7">Harga Tertinggi</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="tinggi" name="tinggi" value="1000">
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Harga Terendah</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="rendah" name="rendah" value="700">
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Harga Penutupan</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="tutup" name="tutup" value="900">
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Resistance 3</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="resistance3" name="resistance3" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Resistance 2</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="resistance2" name="resistance2" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Resistance 3</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="resistance1" name="resistance1" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Pivot</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="pivot" name="pivot" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Support 1</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="support1" name="support1" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Support 2</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="support2" name="support2" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Support 3</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="support3" name="support3" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<a style="color: #ffffff" class="btn btn-primary pull-right" onclick="hitungfb()";">HITUNG</a>


                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-c" role="tabpanel" aria-labelledby="pills-c-tab">
                            <div class="faq-accordion">
                                <div class="accrodion-grp"  data-grp-name="faq-accrodion">
                                    <div class="accrodion active  animated wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                                        <div class="accrodion-inner">
                                            <!--<div class="accrodion-title">
                                                <h4>Target Investasi</h4>
                                            </div>-->
                                            <div class="accrodion-content">
                                                <div class="inner">
												<p>INVESTASI RUTIN SETIAP BULAN</p>
						<div class="row">
							<label class="col-lg-7">Dana investasi per bulan</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="danabulan" name="danabulan" value="25000000">
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Jangka Waktu Investasi (bulan)</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="jangkabulan" name="jangkabulan" value="36">
									<div class="input-group-append">
									<span class="input-group-text">Bulan</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Estimasi Return Per Tahun</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="returnbulan" name="returnbulan" value="13">
									<div class="input-group-append">
									<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Hasil Investasi</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="hasilbulan" name="hasilbulan" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<a style="color: #ffffff" class="btn btn-primary pull-right" onclick="investasibulan()";">HITUNG</a>
						<br/><br/><br/>
												<p>INVESTASI SATU KALI (LUMP SUM)</p>
						<div class="row">
							<label class="col-lg-7">Dana investasi</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="sekalidana" name="sekalidana" value="25000000">
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Jangka Waktu Investasi (tahun)</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="sekalijangka" name="sekalijangka" value="3">
									<div class="input-group-append">
									<span class="input-group-text">Tahun</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Estimasi Return Per Tahun</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="sekalireturn" name="sekalireturn" value="13">
									<div class="input-group-append">
									<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Hasil Investasi</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="sekalihasil" name="sekalihasil" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<a style="color: #ffffff" class="btn btn-primary pull-right" onclick="investasisekali()";">HITUNG</a>

                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-d" role="tabpanel" aria-labelledby="pills-d-tab">
                            <div class="faq-accordion">
                                <div class="accrodion-grp"  data-grp-name="faq-accrodion">
                                    <div class="accrodion active  animated wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                                        <div class="accrodion-inner">
                                            <!--<div class="accrodion-title">
                                                <h4>Modal Investasi</h4>
                                            </div>-->
                                            <div class="accrodion-content">
                                                <div class="inner">
												<p>INVESTASI RUTIN SETIAP BULAN</p>
						<div class="row">
							<label class="col-lg-7">Target Hasil Investasi</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="bulantarget" name="bulantarget" value="50000000">
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Jangka Waktu Investasi (bulan)</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="jangkabulan2" name="jangkabulan2" value="36">
									<div class="input-group-append">
									<span class="input-group-text">Bulan</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Estimasi Return Per Tahun</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="returnbulan2" name="returnbulan2" value="13">
									<div class="input-group-append">
									<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Dana Investasi (per bulan)</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="hasilbulan2" name="hasilbulan2" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<a style="color: #ffffff" class="btn btn-primary pull-right" onclick="danabulan()";">HITUNG</a>
						<br/><br/><br/>
												<p>INVESTASI SATU KALI (LUMP SUM)</p>
						<div class="row">
							<label class="col-lg-7">Target Hasil Investasi</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="sekalitarget" name="sekalitarget" value="50000000">
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Jangka Waktu Investasi (tahun)</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="sekalijangka2" name="sekalijangka2" value="3">
									<div class="input-group-append">
									<span class="input-group-text">Tahun</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-7">Estimasi Return Per Tahun</label>
							<div class="col-lg-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="sekalireturn2" name="sekalireturn2" value="13">
									<div class="input-group-append">
									<span class="input-group-text">%</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-7 control-label normal text-right">Hasil Investasi</label>
							<div class="col-sm-5">
								<div class="input-group input-group-sm">
									<input class="form-control text-right" type="text" id="sekalihasil2" name="sekalihasil2" value="" readonly>
									<div class="input-group-append">
									<span class="input-group-text">IDR</span>
									</div>
								</div>
							</div>
						</div>
						<a style="color: #ffffff" class="btn btn-primary pull-right" onclick="danalumpsump()";">HITUNG</a>

                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

