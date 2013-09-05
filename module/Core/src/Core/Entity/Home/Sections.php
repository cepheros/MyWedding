<?php
namespace Core\Entity\Home;

use Core\Model\OrmEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;


/**
 * Banner Inicial
 *
 * @ORM\Entity
 * @ORM\Table(name="tblhome_sections")
 */

class Sections extends OrmEntity
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
	
	protected $sectionName;
	
	
	/**
	 * @ORM\Column(type="string",length=150)
	 * @var string
	 */
    protected $sectionHeader;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    protected $sectionSecondHeader;
    
    
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $sectionContent;
    
    
    
    
    
    
    
	
	
	
}