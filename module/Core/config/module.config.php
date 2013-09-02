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
								))),
		'di' => array(),
    'view_helpers' => array(
        'invokables'=> array(
            'session' => 'Core\View\Helper\Session',
        	'homemenus' => 'Core\View\Helper\HomeMenus' 
        )
    ),
);
