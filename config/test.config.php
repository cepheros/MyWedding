<?php

return array(
		'db' => array(
				'driver'         => 'Pdo',
				'dsn'            => 'mysql:dbname=mywedding_test;host=localhost',
				'driver_options' => array(
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
				),
				'username' => 'root',
				'password' => '@p0q1o9w2'
		)
		);