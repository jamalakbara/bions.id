<style>
button{
    border:none;
    outline: none;
    cursor: pointer;
}
.chat-btn{
    position: fixed;
    right:30px;
    bottom: 20px;
    background: none;
    /*background: dodgerblue;*/
    color: white;
    width:72px;
    height: 72px;
    /*border-radius: 50%;
    opacity: 0.8;
    transition: opacity 0.3s;
    box-shadow: 0 5px 5px rgba(0,0,0,0.4);*/
	z-index: 900;
}

.chat-btn:hover, .submit:hover, #emoji-btn:hover{
    opacity: 1;
}

.chat-popup{
    display: none;
    position: fixed;
    bottom:80px;
    right:80px;
    height: 500px;
    width: 400px;
    background-color: white;
    /* display: flex; */
    flex-direction: column;
    justify-content: space-between;
    padding: 0.75rem;
    box-shadow: 5px 5px 5px rgba(0,0,0,0.4);
    border-radius: 10px;
	z-index: 1000;
}

.show{
    display: flex;
}
@media (max-width:500px){

    .chat-popup{
        bottom: 120px;
        right:10%;
        width: 80vw;
    }
}
.avatar-sm{
    width:45px;
    height: 45px;
    border-radius: 50%;
    object-fit: cover;
}
.unread {
	cursor: pointer;
	background-color: #f4f4f4;
}
.messages-box {
	max-height: 28rem;
	overflow: auto;
}
.online-circle {
	border-radius: 5rem;
	width: 5rem;
	height: 5rem;
}
.messages-title {
	float: right;
	margin: 0px 5px;
}
.message-img {
	float: right;
	margin: 0px 5px;
}
.message-header {
	text-align: right;
	width: 100%;
	margin-bottom: 0.5rem;
}
.text-editor {
	min-height: 18rem;
}
.messages-list li.messages-you .messages-title {
	float: left;
}
.messages-list li.messages-you .message-img {
	float: left;
}
.messages-list li.messages-you p {
	float: left;
	text-align: left;
}
.messages-list li.messages-you .message-header {
	text-align: left;
}
.messages-list li p {
	max-width: 60%;
	padding: 5px;
	border: #e6e7e9 1px solid;
}
.messages-list li.messages-me p {
	float: right;
}
.ql-editor p {
	font-size: 1rem;
}
#welcome-msg {
	background : #F0F5FD;
	margin: 10px 0px 10px 0px;
	padding: 10px;
	text-align: center;
}

.messages-box input {
	margin: 10px 0px 10px 0px;	
}
.text-blue {
	color : #006060;
}
</style>
<?php
		$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));

$session_id = $tday;
//$session_id = session_id();
//if(!isset($_COOKIE['lg'])) {
//	echo 'tidakada';
//}
//echo $session_id = session_id(); //$sessionname = $_SESSION['botid'];
// $sessbotid = $this->session->userdata('botid');
$sessbotid = session()->get('botid');
if(!isset($sessbotid)) {
?>
               <!--start code-->
               <div class="card chat-popup">
<?php
	helper('form');
	echo form_open(base_url(uri_string()), 'class="form-horizontal"');
?>
                  <div class="card-body messages-box">
				  <center><img src="<?=base_url('images/bot_avatar2.png')?>" class="avatar-sm rounded-circle"></center>
				  <p id="welcome-msg">Halo, saya DINA - chatbot BIONS, siap membantu kamu. Untuk memulai percakapan mohon lengkapi data berikut</p>
				  <ul class="list-unstyled messages-list">
					<li class="messages-me clearfix login_chat">
					  	<input id="nama-me" type="text" name="name" class="form-control input-sm" placeholder="Your name..." />
					  	<input id="email-me" type="text" name="email" class="form-control input-sm" placeholder="Your email..." />
					  	<input id="handphone-me" type="text" name="handphone" class="form-control input-sm" placeholder="Your handphone..." />
						<input id="sessid" type="hidden" name="sessid" class="form-control input-sm" value="<?=$session_id?>" />
					</li>
				  </ul>
                  </div>
                  <div class="card-header">
                    <div id="input-login" class="input-group">
					   <!--<input id="input-me1" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." />
					   <span class="input-group-append">-->
					   <input id="send-me1" type="button" class="btn btn-primary" value="Submit" onclick="send_login()">
					   <!--</span>-->
					</div>
                    <div id="input-msg" class="input-group">
					   <input id="input-me" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." />
					   <span class="input-group-append">
					   <input id="send-me" type="button" class="btn btn-primary" value="Send" onclick="send_msg()">
					   </span>
					</div> 					
                  </div>
               </div>
<?php
	echo form_close();
?>
			<!--end code-->
<?php	
} else {
	$tnow = date("Y-m-d H:i:s", $tday);
	$jnow = date("H:i:s", $tday);

//	$start_date = new DateTime( $this->session->userdata('botjam'));
//	$since_start = $start_date->diff(new DateTime( $tnow ));

$date1 = strtotime($this->session->userdata('botjam'));
$date2 = strtotime($tnow);
$mins = round(($date2 - $date1) / 60);
//echo $mins;

//echo $since_start->days.' days total<br>';
//echo $since_start->y.' years<br>';
//echo $since_start->m.' months<br>';
//echo $since_start->d.' days<br>';
//echo $since_start->h.' hours<br>';
//echo $since_start->i.' minutes<br>';
//echo $since_start->s.' seconds<br>';

//1837 days total
//5 years
//0 months
//10 days
//6 hours
//14 minutes
//2 seconds

//	$start_date = $tnow;
//	$since_start = $start_date->diff($this->session->userdata('botjam'));
//$menit = $since_start->i;
//echo $this->session->userdata('botid');
//$mins = round(abs($mins) / 60,2);
//echo $mins.' '.$this->session->userdata('botjam').'-'.$tnow;
		$user_data = $this->session->userdata();
		foreach ($user_data as $key => $value) {
//			if ($key!='__ci_last_regenerate' && $key != '__ci_vars') $this->session->unset_userdata($key);
//echo $key.'=>'.$value.'<br/>';
		}		

	if($mins > 6 ) {
//	if($mins > 2 ) {
//		echo 'lebih';

//		echo $this->session->userdata('botid');

		$user_data = $this->session->userdata();
		foreach ($user_data as $key => $value) {
			if ($key!='__ci_last_regenerate' && $key != '__ci_vars') $this->session->unset_userdata($key);
		}		

	}

?>
               <!--start code-->
               <div class="card chat-popup">
                  <div class="card-body messages-box">
					 <ul class="list-unstyled messages-list">
							<?php
							date_default_timezone_set('Asia/Jakarta');
							include_once('database.inc.php');
							$res=mysqli_query($con,"select * from st_message where botid = ".$this->session->userdata('botid'));
//							if(mysqli_num_rows($res)>0){
							if($res) {
							if(mysqli_num_rows($res)){
								$html='';
								while($row=mysqli_fetch_assoc($res)){
									$message=$row['message'];
									$added_on=$row['added_on'];
									$strtotime=strtotime($added_on);
									$time=date('H:i A',$strtotime);
									$type=$row['type'];
									if($type=='bot'){
										$class="messages-you";
										$imgAvatar="bot_avatar2.png";
										$name="Dina";
									}else{
										$class="messages-me";
										$imgAvatar="user_avatar.png";
										$name=$row['type'];
									}
//									if($type=='user'){
//										$class="messages-me";
//										$imgAvatar="user_avatar.png";
//										$name="Me";
//									}else{
//										$class="messages-you";
//										$imgAvatar="bot_avatar2.png";
//										$name="Dina";
//									}
									$html.='<li class="'.$class.' clearfix"><span class="message-img"><img src="'.base_url().'images/'.$imgAvatar.'" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">'.$name.'</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'.$time.'</span></small> </div><p class="messages-p">'.$message.'</p></div></li>';
								}
								echo $html;
							}else{
								?>
								<li class="messages-me clearfix start_chat">
								   Please start
								</li>
								<?php
							}
							} else {
								redirect(base_url(), 'refresh');
							}
							?>
                    
                     </ul>
                  </div>
                  <div class="card-header">
                    <div class="input-group">
					   <input id="input-me" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." />
					   <input type="hidden" name="nama-me" id="nama-me" value="<?=$this->session->userdata('botname')?>">
					   <span class="input-group-append">
					   <input id="send-me" type="button" class="btn btn-primary" value="Send" onclick="send_msg()">
					   </span>
					</div> 
                  </div>
               </div>
               <!--end code-->
<?php
}
?>