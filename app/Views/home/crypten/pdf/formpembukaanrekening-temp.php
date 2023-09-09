<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style type="text/css">
			*{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 8pt;
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
            #table td {
				font-size: 9pt;
				vertical-align: top;
            }
            #table td.kotak {
				border: 1px solid #333;
            }
            #table tr:nth-child(even){background-color: #f2f2f2;}
            #table tr:hover {background-color: #ddd;}
            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #215868;
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

            #table3 {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            #table3 td, #table3 th {
                border: 0px solid #ddd;
                padding: 8px;
            }
            #table3 td {
				font-size: 9pt;
				vertical-align: top;
            }
            #table3 td.kotak {
				border: 1px solid #333;
            }
            #table3 th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #215868;
                color: white;
				font-size: 10pt;
            }
			#table3 th img {
				float: right;
			}

        </style>
    </head>
    <body>


<!-- edd 1-->
<?php
	require_once('5.php');
?>


    </body>
</html>