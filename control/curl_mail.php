<?php
  function send_mailgun($email,$subject,$content){
  $config = array();
  $config['api_key'] = "key-39cc8cfbe189875471651e58cd3246be";
  $config['domain'] = "https://www.travaweb.com/";
  $config['api_url'] = "https://api.mailgun.net/v3/".$config['domain']."/messages";
  $message = array();
  $message['from'] = "your domain <noreplay@your-domain.com>";
  $message['to'] =$email;
  //$message['h:Reply-To'] = "&lt;info@domain.com&gt;";
  $message['subject'] =$subject;
  $message['html'] =$content;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $config['api_url']);
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD, "".$config['api_key']."");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
  var_dump($result);
}

echo send_mailgun("curency.aang@gmail.com","helo","hay");

?>
