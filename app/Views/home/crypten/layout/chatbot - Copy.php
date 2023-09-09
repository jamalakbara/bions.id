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
</style>
<?php
if(!isset($_COOKIE['lg'])) {
	echo 'tidakada';
}
echo $session_id = session_id(); //$sessionname = $_SESSION['botid'];
if(!isset($_SESSION['botid'])) {
	echo 'tidakada session';
}
?>
               <!--start code-->
               <div class="card chat-popup">
                  <div class="card-body messages-box">
					 <ul class="list-unstyled messages-list">
							<?php
							date_default_timezone_set('Asia/Jakarta');
							include_once('database.inc.php');
							$res=mysqli_query($con,"select * from st_message");
							if(mysqli_num_rows($res)>0){
								$html='';
								while($row=mysqli_fetch_assoc($res)){
									$message=$row['message'];
									$added_on=$row['added_on'];
									$strtotime=strtotime($added_on);
									$time=date('h:i A',$strtotime);
									$type=$row['type'];
									if($type=='user'){
										$class="messages-me";
										$imgAvatar="user_avatar.png";
										$name="Me";
									}else{
										$class="messages-you";
										$imgAvatar="bot_avatar2.png";
										$name="Dina";
									}
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
							?>
                    
                     </ul>
                  </div>
                  <div class="card-header">
                    <div class="input-group">
					   <input id="input-me" type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." />
					   <span class="input-group-append">
					   <input id="send-me" type="button" class="btn btn-primary" value="Send" onclick="send_msg()">
					   </span>
					</div> 
                  </div>
               </div>
               <!--end code-->

		<button class="chat-btn"> 
            <img class="material-iconss" src="<?=base_url('images/tanyacs.png')?>">
        </button>