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

class Users extends OrmEntity
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
	 * @ORM\Column(type="string",length=50)
	 * @var string
	 */

	protected $role;

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




    public function __construct()
    {
        $this->dataCasamento = new \DateTime();
    }






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

	public function setDataCasamento(DateTime $dataCasamento) {
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


	public function getRole() {
		return $this->role;
	}

	public function setRole(string $role) {
		$this->role = $role;
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
					'required '=> false,
					'filters' => array(
							array('name' => 'Int')
					),

			)));

			$inputFilter->add($factory->createInput(array(
					'name'     => 'nomeNoiva',
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
											'max'      => 250,
									),
							),
					),
			)));

			$inputFilter->add($factory->createInput(array(
			    'name'     => 'nomeNoivo',
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
			                'max'      => 250,
			            ),
			        ),
			    ),
			)));


			$inputFilter->add($factory->createInput(array(
			    'name'     => 'password',
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
			                'min'      => 6,
			                'max'      => 50,
			            ),
			        ),
			    ),
			)));

			$inputFilter->add($factory->createInput(array(
			    'name'     => 'passwordCheck',
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
			                'min'      => 6,
			                'max'      => 50,
			            ),
			        ),
			        array(
			            'name' => 'identical',
			            'options' => array('token' => 'password' )
			        ),
			    ),
			)));

			$inputFilter->add($factory->createInput(array(
			    'name'     => 'emailNoiva',
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
			                'min'      => 6,
			                'max'      => 250,
			            ),
			        ),
			        array(
			            'name' => 'EmailAddress'

			        ),
			    ),
			)));

			$inputFilter->add($factory->createInput(array(
			    'name'     => 'emailNoivo',
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
			                'min'      => 6,
			                'max'      => 250,
			            ),
			        ),
			        array(
			            'name' => 'EmailAddress'

			        ),
			    ),
			)));

			$inputFilter->add($factory->createInput(array(
			    'name'     => 'role',
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
			                'max'      => 250,
			            ),
			        ),
			    ),
			)));



			$inputFilter->add($factory->createInput(array(
			    'name' => 'idPlano',
			    'required '=> true,
			    'filters' => array(
			        array('name' => 'Int')
			    ),

			)));


			$inputFilter->add($factory->createInput(array(
			    'name'     => 'dataCasamento',
			    'required' => true,
			    'filters'  => array(
			        array('name' => 'StripTags'),
			        array('name' => 'StringTrim'),
			    ),
			    'validators' => array(
			        array(
			            'name'    => 'Date',
			            'options' => array(
			                'format' => 'd/m/Y',
			            ),
			        ),
			    ),
			)));

			$this->inputFilter = $inputFilter;

            return $this->inputFilter;

		}
	}





}

?>