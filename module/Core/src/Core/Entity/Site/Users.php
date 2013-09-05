<?php

namespace Core\Entity\Site;

use Core\Model\OrmEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;


/**
 * Banner Inicial
 *
 * @ORM\Entity
 * @ORM\Table(name="tblsite_users")
 */

class FirstBanner extends OrmEntity
{
	
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 * @var integer
	 */
	
	protected $id;
	
	/**
	 * @ORM\Column(type="string",length=250)
	 * @var string
	 */
	
	protected $nomeNoiva;
	
	/**
	 * @ORM\Column(type="string",length=250)
	 * @var string
	 */
	
	protected $emailNoiva;
	
	/**
	 * @ORM\Column(type="string",length=250)
	 * @var string
	 */
	
	protected $nomeNoivo;
	
	/**
	 * @ORM\Column(type="string",length=250)
	 * @var string
	 */
	
	protected $emailNoivo;
	
	
	/**
	 * @ORM\Column(type="string",length=250)
	 * @var string
	 */
	
	protected $userName;
	
	
	/**
	 * @ORM\Column(type="string",length=50)
	 * @var string
	 */
	
	protected $password;
	
	
	/**
	 * @ORM\Column(type="datetime")
	 * @var string
	 */
	
	protected $dataCasamento;
	
	
	/**
	 * @ORM\Column(type="integer")
	 * @var integer
	 */
	
	protected $idPlano;
	
	
	
	
	

	
	
	

	public function getId() {
		return $this->id;
	}
	
	public function setId(integer $id) {
		$this->id = $id;
		return $this;
	}
	
	public function getNomeNoiva() {
		return $this->nomeNoiva;
	}
	
	public function setNomeNoiva(string $nomeNoiva) {
		$this->nomeNoiva = $nomeNoiva;
		return $this;
	}
	
	public function getEmailNoiva() {
		return $this->emailNoiva;
	}
	
	public function setEmailNoiva(string $emailNoiva) {
		$this->emailNoiva = $emailNoiva;
		return $this;
	}
	
	public function getNomeNoivo() {
		return $this->nomeNoivo;
	}
	
	public function setNomeNoivo(string $nomeNoivo) {
		$this->nomeNoivo = $nomeNoivo;
		return $this;
	}
	
	public function getEmailNoivo() {
		return $this->emailNoivo;
	}
	
	public function setEmailNoivo(string $emailNoivo) {
		$this->emailNoivo = $emailNoivo;
		return $this;
	}
	
	public function getUserName() {
		return $this->userName;
	}
	
	public function setUserName(string $userName) {
		$this->userName = $userName;
		return $this;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function setPassword(string $password) {
		$this->password = $password;
		return $this;
	}
	
	public function getDataCasamento() {
		return $this->dataCasamento;
	}
	
	public function setDataCasamento(string $dataCasamento) {
		$this->dataCasamento = $dataCasamento;
		return $this;
	}
	
	public function getIdPlano() {
		return $this->idPlano;
	}
	
	public function setIdPlano(integer $idPlano) {
		$this->idPlano = $idPlano;
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
					'name'     => 'text',
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
											'max'      => 500,
									),
							),
					),
			)));
	
		}
	}
	
	
	
    
	
}

?>