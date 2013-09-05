<?php
return array(
		'doctrine' => array(
				'driver' => array(
						'application_entities' => array(
								'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
								'cache' => 'array',
								'paths' => array(__DIR__ . '/../src/Core/Entity')
						),
						'orm_default' => array(
								'drivers' => array(
										'Core\Entity' => 'application_entities'
								)
								),
						'cache'=> 'Doctrine\Common\Cache\ArrayCache'),
						'paths' => array(__DIR__ . '/../src/Core/Entity')
								),
		'di' => array(),
		'view_helpers' => array(
				'invokables' => array(
						'session' => 'Core\View\Helper\Session',
						'homemenus' => 'Core\View\Helper\HomeMenus',
						'firstBanner' => 'Core\View\Helper\FirstBanner',
						'MyHelper' => 'Core\View\Helper\MyHelper',
				),
		),
	    'service_manager' => array(
	        'factories' => array(
	    		    'Session' => function ($sm){
    	    			return new Zend\Session\Container('SysSession');
	    		    },
	    		    'Core\Service\Auth\Admin' => function ($sm){
    	    			$dbAdapter = $sm->get('DbAdapter');
	    			    return new Core\Service\Auth\Admin($dbAdapter);
	    		    },
    	    		'Core\Service\Auth\Users' => function ($sm){
	        		    $dbAdapter = $sm->get('DbAdapter');
	        		    return new Core\Service\Auth\Users($dbAdapter);
	    	   		},
	    	    	'Cache' => function ($sm){
	    		    	// incluindo o arquivo config para pegar o cache adapter
	    			    $config = include __DIR__ . '/../../../config/application.config.php';
	    			    $cache = Zend\Cache\StorageFactory::factory(array(
	    					    'adapter' => array(
	    							    'name' => $config['cache']['adapter'],
	    							    'options' => array(
	    									//     tempo de validade do cache
	    									    'ttl' => 1800,
	    									//     adicionando o diretorio data/cache para salvar os caches.
            									'cacheDir' => __DIR__ . '/../../../data/cache'
	        							),
	    	    				),
	    			    		'plugins' => array(
	    		  		    			'exception_handler' => array('throw_exceptions' => false),
	    					    		'Serializer'
	    					    )
	    			    	)
	    			    );
	    			
	    			    $cache->clearExpired();	    			
	    			    return $cache;
	    		
	    	    	},
	    		    'Zend\Log' => function ($sm) {
	    			    $today= date('Y-m-d');
	    			    $log = new Zend\Log\Logger();
	    			    $writer = new Zend\Log\Writer\Stream(__DIR__ . '/../../../data/logs/' . $today .'.log');
	    			    $log->addWriter($writer);
	    			    return $log;
	    		    },
 		    	)
	    	)
	    );
