<?php
include 'db_connection.php';

function getsessionid()
{
  require_once(dirname( __FILE__ ) . "/ChatweeV2_SDK/Chatwee.php");
  ChatweeV2_Configuration::setChatId('60f96c3ea471a961bf76e172');
  ChatweeV2_Configuration::setClientKey('52ee020bd6cfd7144749e201');
      $userId = ChatweeV2_SsoUser::register(Array(
      "login" => "$chatwee_name",
      "isAdmin" => false,
      "avatar" => ""
      ));

      $sessionId = ChatweeV2_SsoUser::login(Array(
          "userId" => $userId,
         
        ));
        return $sessionId;
}

function set_sessionid($sessionId){
  $_SESSION["chatweesessionid"] = $sessionId;
  echo  $_SESSION["chatweesessionid"];
}

?>