<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

defined('SYSCONFIGS_PATH')
|| define('SYSCONFIGS_PATH', realpath(dirname(__FILE__) . '/../data/configs'));

// Setup autoloading
include dirname(__FILE__) . '/../vendor/autoload.php';

// Run the application!
Zend\Mvc\Application::init(include 'config/application.config.php')->run();
