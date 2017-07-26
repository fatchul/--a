<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

  class Kafka {
  	function Kafka(){
  		require_once('Kafka/Request.php');
  		require_once('Kafka/Encoder.php');
  		require_once('Kafka/FetchRequest.php');
  		require_once('Kafka/Message.php');
  		require_once('Kafka/MessageSet.php');
  		require_once('Kafka/Producer.php');
  		
  		require_once('Kafka/RequestKeys.php');
  		require_once('Kafka/SimpleConsumer.php');
  		require_once('Kafka/BoundedByteBuffer/Receive.php');
  		require_once('Kafka/BoundedByteBuffer/Send.php');
  	}
  }