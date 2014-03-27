<?php

// This is our new stuff
    $context = new ZMQContext();
    $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
    $socket->connect("tcp://hugde.com:5555");
	$entryData = array('cat'=>'kittensCategory','title'=>'websocket testing');
    $socket->send(json_encode($entryData));

?>