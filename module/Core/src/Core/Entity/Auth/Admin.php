<?php

namespace Core\Entity\Auth;

use Doctrine\ORM\Mapping as ORM;
use Zend\Db\Sql\Ddl\Column\Integer;

/** @ORM\Entity 
 * @ORM\Table(name="tblsystem_users")
 */
class Admin
{
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 * @var integer
	 */
	
	protected $id;
	
	/**
	 * @ORM\Column(type="string",length=150)
	 * @var string
	 */
	
	protected $fullName;
	
	
	
	
	
	
}