<?php

error_reporting(E_ALL);

require("assets/ChatweeV2_SDK/Chatwee/Configuration.php");
require("assets/ChatweeV2_SDK/Chatwee/HttpClient.php");
require("assets/ChatweeV2_SDK/Chatwee/SsoUser.php");
require("assets/ChatweeV2_SDK/Chatwee/SsoManager.php");
require("assets/ChatweeV2_SDK/Chatwee/Utils.php");
require("assets/ChatweeV2_SDK/Chatwee/Session.php");

abstract class ChatweeV2
{
}

if (version_compare(PHP_VERSION, "5.2.1", "<")) {
    throw new Exception("PHP version >= 5.2.1 required");
}