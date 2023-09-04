<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style type="text/css">
			body { background-image: url(<?php echo base_url('images/page1.jpg'); ?>); background-size: cover; background-repeat: no-repeat; background-position: center; }
			*{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 10pt;
			}
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            #table td, #table th {
                border: 0px solid #ddd;
                padding: 8px;
            }
            #table tr:nth-child(even){background-color: #f2f2f2;}
            #table tr:hover {background-color: #ddd;}
            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
				font-size: 10pt;
            }
			#table th img {
				float: right;
			}

			#table2 {
                border-collapse: collapse;
                width: 100%;
			}
			#table2 td.right {
				text-align: right;
			}

        </style>
    </head>
    <body>
        <table id="table">
            <thead>
                <tr>
                    <th>FORMULIR APLIKASI PEMBUKAAN REKENING EFEK PERORANGAN<br/><i>Application Form of Securities Account Opening for Individual Customer</i></th>
                    <th><img src="<?=base_url('images/logobnisek.png')?>"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table id="table2">
            <tbody>
                <tr>
                    <td width="60%" >Mohon diisi dengan huruf cetak dan beri tanda &#10004; pada kotak pilihan <br/><i>(Please fill in with with block letters and mark &#10004; in the box)</i></td>
                    <td width="20%" class="right">Nomor Formulir<br/><i>(Form Number)</i></td>
                    <td width="20%" class="right"></td>
                </tr>
            </tbody>
        </table>
        <table id="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Harga Jual</th>
                    <th>Terjual</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Kacang Goreng</td>
                    <td>Rp5.000,-</td>
                    <td>1</td>
                    <td>25 Oktober 2020, 17:01:03</td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>Kopi Hitam</td>
                    <td>Rp5.000,-</td>
                    <td>1</td>
                    <td>25 Oktober 2020, 16:01:03</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>Gorengan Bakwan</td>
                    <td>Rp3.000,-</td>
                    <td>3</td>
                    <td>25 Oktober 2020, 15:01:02</td>
                </tr>
                <tr>
                    <td scope="row">4</td>
                    <td>Nasi uduk</td>
                    <td>Rp14.000,-</td>
                    <td>2</td>
                    <td>25 Oktober 2020, 14:04:03</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>