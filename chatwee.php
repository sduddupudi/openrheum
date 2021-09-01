<?php
require_once(dirname( __FILE__ ) . "/ChatweeV2_SDK/Chatwee.php");
ChatweeV2_Configuration::setChatId('60f96c3ea471a961bf76e172');
ChatweeV2_Configuration::setClientKey('52ee020bd6cfd7144749e201');
    $userId = ChatweeV2_SsoUser::register(Array(
      "login" => "Chatwee",
      "isAdmin" => false,
      "avatar" => ""
    ));
        $sessionId = ChatweeV2_SsoUser::login(Array(
          "userId" => $userId,
        ));

ChatweeV2_Session::setSessionId($sessionId);

?>