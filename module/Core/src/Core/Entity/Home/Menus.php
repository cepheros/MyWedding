<?php
namespace  Core\Entity\Home;

use Core\Model\OrmEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * Home Menus
 *
 * @ORM\Entity
 * @ORM\Table(name="tblhome_menus")
 */

class Menus extends OrmEntity
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
	
	protected $menuName;
	
	
	/**
	 * @ORM\Column(type="string",length=150)
	 * @var string
	 */
	
	protected $menuLink;

	/**
	 * @return the integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param integer $id
	 */
	public function setId(integer $id) {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getMenuName() {
		return $this->menuName;
	}
	
	/**
	 * @param string $menuName
	 */
	public function setMenuName(string $menuName) {
		$this->menuName = $menuName;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getMenuLink() {
		return $this->menuLink;
	}
	
	/**
	 * @param string $menuLink
	 */
	public function setMenuLink(string $menuLink) {
		$this->menuLink = $menuLink;
		return $this;
	}
	
	
	/**
	 * Configura os filtros dos campos da entidade
	 *
	 * @return Zend\InputFilter\InputFilter
	 */
	public function getInputFilter()
	{
		if (! $this->inputFilter) {
			$inputFilter = new InputFilter();
	
			$factory = new InputFactory();
	
			$inputFilter->add($factory->createInput(array(
					'name' => 'id',
					'required '=> true,
					'filters' => array(
							array('name' => 'Int')
					),
	
			)));
	
			$inputFilter->add($factory->createInput(array(
					'name'     => 'menuName',
					'required' => true,
					'filters'  => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array(
									'name'    => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min'      => 1,
											'max'      => 150,
									),
							),
					),
			)));
			
			
			$inputFilter->add($factory->createInput(array(
					'name'     => 'menuLink',
					'required' => true,
					'filters'  => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array(
									'name'    => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min'      => 1,
											'max'      => 150,
									),
							),
					),
			)));
			
		
		}
	}
	
}
