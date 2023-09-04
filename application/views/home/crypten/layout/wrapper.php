<!doctype html>
<html lang="en">
<head>
<?php require_once('head.php'); ?>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '5811819338858835');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=5811819338858835&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>
<body>
<?php require_once('header.php'); ?>
<?php require_once('content.php'); ?>
<?php require_once('footer.php'); ?>
<?php require_once('chatbot.php'); ?>
<!--<a id="scroll_up"><i class="far fa-angle-up"></i></a>-->
<?php require_once('foot.php'); ?>
</body>
</html>