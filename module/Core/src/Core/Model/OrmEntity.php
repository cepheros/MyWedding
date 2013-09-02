<?php
namespace Core\Model;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class OrmEntity implements InputFilterAwareInterface
{
	/**
	 * @var Zend\InputFilter\InputFilter
	 */
	protected $inputFilter;
	
	/**
	 * Magic getter to expose protected properties.
	 *
	 * @param string $property
	 * @return mixed
	 */
	public function __get($property)
	{
		return $this->$property;
	}
	
	
	public function __set($property, $value)
	{
		$this->$property = $value;
	}
	
	
	/**
	 * Convert the object to an array.
	 *
	 * @return array
	 */
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
	
	
	/**
	 * Populate from an array.
	 *
	 * @param array $data
	 */
	public function populate(array $data = array())
	{
		foreach ($data as $property => $value) {
			if (! property_exists($this, $property)) {
				continue;
			}
			$this->$property = $value;
		}
	}
	
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used!");
	}
	
	
	public function getInputFilter()
	{
		
	}
	
	
}