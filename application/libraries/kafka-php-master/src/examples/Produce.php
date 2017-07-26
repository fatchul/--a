#!/usr/bin/php
<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one or more
 * contributor license agreements.  See the NOTICE file distributed with
 * this work for additional information regarding copyright ownership.
 * The ASF licenses this file to You under the Apache License, Version 2.0
 * (the "License"); you may not use this file except in compliance with
 * the License.  You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

set_include_path(
	implode(PATH_SEPARATOR, array(
		realpath(__DIR__ . '/../lib'),
		get_include_path(),
	))
);

require 'autoloader.php';

class Produce{
	function Produce(){
		sleep(5);
		$host = '52.221.106.118';
		$port = 9092;
		$topic = 'arkademy_calls';

		$producer = new Kafka_Producer($host, $port, Kafka_Encoder::COMPRESSION_NONE);
		$in = fopen('php://stdin', 'r');
		// while (true) {
			echo "\nEnter comma separated messages:\n";
			// $messages = explode(',', fgets($in));
			$messages=['hi','hoy'];
			foreach (array_keys($messages) as $k) {
				//$messages[$k] = trim($messages[$k]);
			}
			$bytes = $producer->send($messages, $topic,0);
			printf("\nSuccessfully sent %d messages (%d bytes)\n\n", count($messages), $bytes);

		// }
	}
}
