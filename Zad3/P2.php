#!/usr/bin/php

<?php
	
	
	
	$host = "127.0.0.1";
	$port = 12345;
    $from = '';
    $server_ip = '127.0.0.1';
    $server_port = 43278;
	
	if( ! ( $server = socket_create( AF_INET, SOCK_DGRAM, SOL_UDP ) ) )
	{
		print "socket_create(): " 		. socket_strerror( socket_last_error( $server ) ) . "\n";
		exit( 1 );
	}
    if ( !( $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)))
    {
        print "socket_create(): " 		. socket_strerror( socket_last_error( $server ) ) . "\n";
		exit( 1 );
    }

	
	if( ! socket_set_option($server, SOL_SOCKET, SO_REUSEADDR, 1) )
	{
		print "socket_set_option(): " 	. socket_strerror(socket_last_error( $server ) ) . "\n";
		exit( 1 );
	}
	
	
	if( ! socket_bind( $server, $host, $port ) )
	{
		print "socket_bind(): " 		. socket_strerror( socket_last_error( $server ) ) . "\n";
		exit( 1 );
	}
	
	$msg = "";
	while( 1 )
	{
        socket_recvfrom ( $server , $msg , 256 , MSG_OOB , $from, $port);
        $str = bin2hex($msg);
        socket_sendto($socket, $str, strlen($str), 0, $server_ip, $server_port);
	}
	
	socket_close( $server );
	
?>
