    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
      <?php 
        if(isset($learning["meta_title"])) {
					if ($learning["meta_title"] != null && $learning["meta_title"] != "") {
						echo $learning["meta_title"]; 
					} else{
						echo $config["site_title"];
					}
        } else if(isset($event["meta_title"])){
					if ($event["meta_title"] != null && $event["meta_title"] != "") {
						echo $event["meta_title"]; 
					} else{
						echo $config["site_title"];
					}
				} else { 
          echo $config["site_title"];
        } 
      ?>
    </title>
    <meta name="title" content="<?php if(isset($learning["meta_title"])) { echo $learning["meta_title"]; } else if(isset($event["meta_title"])){echo $event["meta_title"];} else { echo $config["site_title"]; } ?>">
    <meta name="description" content="<?php if(isset($learning["meta_desc"])) { echo $learning["meta_desc"]; } else if(isset($event["meta_desc"])){echo $event["meta_desc"];} ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="facebook-domain-verification" content="8919e7nij2vlp0yyulnpq9kbneoepn" />
    <meta name="google-site-verification" content="qdoP3HQAT476O0B2nC-uG55EdBpP4b1G1IlwTHMj-Bk" />
    <link rel="shortcut icon" href="<?=base_url('assets/home/'.$config["template"].'/')?>images/favicon.ico" type="image/png">
    <link rel="stylesheet" href="<?=base_url('assets/home/'.$config["template"].'/')?>css/bootstrap.min.css">
    
<?php
	// $task = $this->uri->rsegment(1);
	$task = '';
	// $action = $this->uri->rsegment(2);
	$action = '';
	if($task != 'user') {
?>
    <link rel="stylesheet" href="<?=base_url('assets/home/'.$config["template"].'/')?>css/nice-select.css">
<?php
	} else {
?>
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/'.$config["template"].'/')?>css/jquery.signature.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin/')?>bower_components/select2/dist/css/select2.min.css">
<?php
	}
?>

    <link rel="stylesheet" href="<?=base_url('assets/home/'.$config["template"].'/')?>css/default.css">
    <link rel="stylesheet" href="<?=base_url('assets/home/'.$config["template"].'/')?>css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/'.$config["template"].'/')?>plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/home/'.$config["template"].'/')?>plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
	
<style type="text/css">
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.blog-post-top-content ul, .blog-post-top-content ol {
    margin: 20px 0px 20px 25px;
    padding: 0px;
    /*list-style-type: none;*/
	list-style-type: square;
}
.blog-post-top-content li ul, .blog-post-top-content li ol {
    margin: 0px 0px 0px 25px;
    padding: 0px;
    /*list-style-type: none;*/
}
.blog-post-top-content ol {
  list-style: decimal;
  /*counter-reset: my-awesome-counter;*/
}
.blog-post-top-content ol li {
 /* counter-increment: my-awesome-counter;*/
}
.blog-post-top-content ol li::before {
  /*content: counter(my-awesome-counter) ". ";*/
  color: #004c4c;
  /*font-weight: bold;*/
}
.blog-post-top-content p {
    margin: 20px 0px 20px 0px;
}
span.select2.select2-container.select2-container--bootstrap{width:100%!important;}
.marketplace-area .marketplace-item img {
    position: relative;
    right: 0px;
    top: 0px;
}
.marketplace-area .marketplace-item td {
	padding: 10px;
}
#scroll_up {
    position: fixed;
    bottom: 30px;
    right: 80px;
    height: 40px;
    width: 40px;
    border-radius: 8px;
    background: #00aaad;
    text-align: center;
    line-height: 40px;
    color: #fff;
    cursor: pointer;
    display: none;
    z-index: 999;
}
.footer-area {
    /*background-color: #333333;*/
	background-color: #004c4c;
    padding-top: 50px;
    padding-bottom: 50px;
    color: #FFFFFF !important;
}
.footer-area .footer-list .title {
    font-size: 14px;
    font-weight: 600;
    color: #FFFFFF;
    text-transform: uppercase;
    padding-bottom: 10px;
}
.footer-area .footer-list ul li a {
    font-size: 18px;
    line-height: 40px;
    color: #ffffff;
    -webkit-transition: all .3s ease-out 0s;
    transition: all .3s ease-out 0s;
}
.footbar {
    background-color: #000;
}
h3.title {
	color: black !important;
}
.benefits-item.item-2 {
    margin-top: 50px;
}
.benefits-area {
    padding-bottom: 50px;
}
.blog-area {
    padding-top: 50px;
    padding-bottom: 50px;
}
.footer-area {
    padding-top: 50px;
    padding-bottom: 50px;
}
.faq-area {
    padding-top: 50px;
    padding-bottom: 50px;
}
.marketplace-area {
    padding-top: 50px;
    padding-bottom: 50px;
}
.faq-area .section-title .nav li a {
    padding: 0;
    line-height: 50px;
    padding: 0 40px;
    border-radius: 4px;
    background: #004c4c;
    font-weight: 600;
    text-transform: uppercase;
    color: #fff;
    letter-spacing: 1px;
}
.contact-area {
    padding-top: 50px;
    padding-bottom: 50px;
}

.page-title-content {
    overflow-wrap: break-word !important;
}

.page-title-content h3.title {
    color: white !important;
}
.page-title-area .page-title-content {
    padding-top: 150px;
}
.page-title-thumb-area-about {
    margin-top: -485px;
    position: relative;
    z-index: 10;
}
/* @media (max-width: 767px) {
.page-title-thumb-area {
    margin-top: -250px;
}
.logobni {
	float: right;
}
}
@media only screen and (max-width: 767px) and (min-width: 576px) {
.page-title-thumb-area {
    margin-top: -200px;
}
} */

@media only screen and (min-width: 992px) and (max-width: 1200px) {
	.page-title-area .page-title-content .title {
		font-size: 33px;
	}
}

@media only screen and (min-width: 768px) and (max-width: 991px){
	.page-title-thumb-area{
		margin-top: -370px !important;
	}

	.page-title-thumb-area-artikel {
		margin-top: -790px !important;
	}

	.page-title-area .page-title-content .title{
		font-size: 35px !important;
	}
}

@media only screen and (max-width: 767px) and (min-width: 576px) {
	.page-title-thumb-area {
		margin-top: -220px !important;
	}

	.page-title-thumb-area-artikel {
		margin-top: -690px !important;
	}

	.page-title-area .page-title-content .title{
		font-size: 35px !important;
	}
}

@media (max-width: 575px) {
	.page-title-thumb-area {
		margin-top: -200px !important;
	}

	.page-title-thumb-area-artikel {
		margin-top: -630px !important;
	}

	.logobni {
		float: right;
	}

	.page-title-area .page-title-content .title{
		font-size: 28px !important;
	}

}

.panel5 {
	height: 200px;
	overflow: auto;
}

.panel5 > .panel-heading {
  background: #b3e2da url(../img/heading-panel5.png) no-repeat;
  background-position: right top;
  height: 30px;
  /*padding-top: 6px;*/
  padding: 6px;
  font-size: 11px;
}
.panel5 > .panel-body {
  background: #004c4c;
  font-size: 12px;
  /*padding-top: 5px;*/
  padding: 6px;
}
.panel5 > .panel-body > .info {
  color: #feac00;
}

.tabpanel5 > .nav-pills5 > li {
  float: left;
}
.tabpanel5 > .nav-pills5 > li > a {
  padding: 2px 5px 2px 5px;
  color: #fff;
  outline: none;
  font-weight: 600;
}
.tabpanel5 > .nav-pills5 > li > a:hover {
  background: #FFC100;
  border-radius: 3px;
  color: #033C76;
}
.tabpanel5 > .nav-pills5 > li + li {
  margin-left: 2px;
}
.tabpanel5 > .nav-pills5 > li.active > a, .tabpanel5 > .nav-pills5 > li.active > a:hover, .tabpanel5 > .nav-pills5 > li.active > a:focus {
  color: #033c76;
  background-color: #ffc100;
  border-radius: 3px;
}
.tabpanel5 > .tab-content {
  min-height: 110px;
  padding-top: 5px;
}
.tabpanel5 > .tab-content .table5 {
  margin-bottom: 0px;
  color: #fff;
}
.tabpanel5 > .tab-content .table5 .title {
  background: #002f30;
  color : #ffc100;
  font-size: 14px;
}
.tabpanel5 > .tab-content .table5 .title td {
  padding: 3px;
  border-top: none;
}
.tabpanel5 > .tab-content .table5 tr {
  border: none;
}
.tabpanel5 > .tab-content .table5 tr td {
  padding: 3px;
  border-bottom: 1px #033364 solid;
}
.tabpanel5 > .nav-pills5 > li > a {
    font-size: 12px;
}

.tabpanel4 {
  /* min-height: 198px; */
   min-height: 238px; 
  background: #004c4c;
}
.tabpanel4 > .nav-pills4 {
  background: #414141 url(../img/nav-pills4.jpg) repeat-x;
}
.tabpanel4 > .nav-pills4 > li {
  float: left;
}
.tabpanel4 > .nav-pills4 > li > a {
  color: #fff;
  padding: 5px 20px 5px 15px;
  outline: none;
}
.tabpanel4 > .nav-pills4 > li > a:hover {
  background: none;
}
.tabpanel4 > .nav-pills4 > li + li {
  margin-left: 0px;
}
.tabpanel4 > .nav-pills4 > li.active > a, .tabpanel4 > .nav-pills4 > li.active > a:hover, .tabpanel4 > .nav-pills4 > li.active > a:focus {
  color: #765c05;
  background: #d18902 url(../img/nav-pills4-active.jpg) no-repeat;
  background-position: right top;
}
.tabpanel4 > .tab-content {
  padding: 13px;
  color: #fff;
  font-size: 12px;
  /*height: 168px;*/
  height: 198px;
  overflow: hidden;
}
.tabpanel4 > .tab-content > .tab-pane > .content-scroll {
  height: 140px;
  overflow: hidden;
}

.panel2 {
  background: #004c4c;
  padding-left: 10px;
  padding-right: 10px;
  border-radius: 5px;
}
.panel2 > .panel-heading {
  background-position: center right;
  color: #ffab09;
  text-transform: uppercase;
  font-size: 18px;
  padding: 3px 3px 3px 0px;
  font-weight: 700;
  border-bottom: 1px #ffab09 solid;
  text-align: center;
}
.panel2 > .panel-heading > span {
  padding: 3px 9px 3px 5px;
}
.panel2 > .panel-body {
  padding: 0px;
}
.panel2 > .panel-body > .table2 {
  margin-bottom: 0px;
}
.panel2 > .panel-body > .table2 .title td {
  padding: 3px;
  color: #ffc100;
  border-top: none;
  font-weight: 600;
  text-align: center;
}
.panel2 > .panel-body > .table2 tr {
  border: none;
}
.panel2 > .panel-body > .table2 tr td {
    padding: 2px;
    color: #fff;
    text-align: center;
    border-top: 1px #b4b4b4 solid;
}

.table-layout {
    display: table;
    width: 100%;
    table-layout: fixed;
    margin-bottom: 20px;
    padding: 0;
}
.nm {
    margin: 0!important;
}

.fc-content {
	color: #ffffff;
}
.fc-content .fc-title {
	padding: 5px;
	font-size: 11px;
}
.fc-content .fc-time {
	padding: 5px;
}
.fc-event-time, .fc-event-title {
	padding: 0 1px;
	white-space: nowrap;
}
.fc-title {
	white-space: normal;
}
.faq-area .section-title .nav li a.active {
    background: #004c4c;
    color: #fff;
}
.faq-area .section-title .nav li a {
    background: #fff;
    color: #007de0;
    padding: 0;
    line-height: 50px;
    padding: 0 40px;
    border-radius: 4px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
	margin: 5px;
}
.benefits-item .benefits-item-content .title {
    font-size: 40px;
    line-height: 40px;
    color: #2f3541;
    font-weight: 400;
    padding-bottom: 31px;
}
@media only screen and (max-width: 767px) and (min-width: 576px){
.benefits-item .benefits-item-content .title {
    font-size: 40px;
    line-height: 20px;
}
    .logobni1 {
        display: none !important;
    }
    .logobni2 {
        display: inline !important;
    }
.register-btn a {
    line-height: 50px;
    background: transparent;
    border: 2px solid #ef6b01;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 0 36px;
	margin: 10px 0 0 0;
}
.blog-post-area .blog-post-item .blog-post-comments .blog-comments-item .item .thumb {
    min-width: 150px !important;
    max-width: 150px !important;
    border-radius: 50%;
    overflow: hidden;
    display: inline-block;
}
}

@media screen and (min-width: 576px) {
    .register-btn a {
        display: none !important;
    }
    .logobni2 {
        display: none !important;
    }
    .logobni1 {
        display: inline !important;
    }
}
        .kbw-signature { width: 400px; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
</style>

<link rel="stylesheet" href="<?=base_url('assets/home/'.$config["template"].'/')?>css/all.css">

<?=$config["g_analitycs"]?>
