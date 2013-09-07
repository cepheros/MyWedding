<?php

// module/Skel/conﬁg/module.config.php:
return array(
    'controllers' => array( //add module controllers
        'invokables' => array(
            'Users\Controller\Index' => 'Users\Controller\IndexController',
            'Users\Controller\Auth'  => 'Users\Controller\AuthController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'users' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/users',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Users\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                        'module'        => 'users'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                        'child_routes' => array( //permite mandar dados pela url 
                            'wildcard' => array(
                                'type' => 'Wildcard'
                            ),
                        ),
                    ),
                    
                ),
            ),
        ),
    ),
    
    'view_manager' => array( 
        'template_path_stack' => array(
            'skel' => __DIR__ . '/../view',
        ),
    ),
   
);