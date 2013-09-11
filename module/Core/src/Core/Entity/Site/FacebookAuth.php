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
 * @ORM\Table(name="tblsite_users_facebook")
 */

class FacebookAuth extends OrmEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var integer
     */

    protected $id;
    
    /**
     * @ORM\Column(type="integer",nullable=true)
     * @ORM\OneToMany(targetEntity="Core\Entity\Site\Users", mappedBy="id", cascade={"persist", "remove"})
     * @var integer
     */
    
    protected $idUser;
    
    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    
    protected $uid;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    
    protected $name;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    
    protected $image;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    
    protected $facebookUrl;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    
    protected $token;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    
    protected $expiresToken;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    
    protected $gender;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    
    protected $timezone;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    
    protected $locale;
    
    
    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */
    
    protected $signature;

	/**
	 * @return the integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param  $id
	 */
	public function setId( $id) {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return the integer
	 */
	public function getIdUser() {
		return $this->idUser;
	}
	
	/**
	 * @param  $idUser
	 */
	public function setIdUser( $idUser) {
		$this->idUser = $idUser;
		return $this;
	}
	
	/**
	 * @return the integer
	 */
	public function getUid() {
		return $this->uid;
	}
	
	/**
	 * @param  $uid
	 */
	public function setUid( $uid) {
		$this->uid = $uid;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @param  $name
	 */
	public function setName( $name) {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getImage() {
		return $this->image;
	}
	
	/**
	 * @param  $image
	 */
	public function setImage( $image) {
		$this->image = $image;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getFacebookUrl() {
		return $this->facebookUrl;
	}
	
	/**
	 * @param  $facebookUrl
	 */
	public function setFacebookUrl( $facebookUrl) {
		$this->facebookUrl = $facebookUrl;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getToken() {
		return $this->token;
	}
	
	/**
	 * @param  $token
	 */
	public function setToken( $token) {
		$this->token = $token;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getExpiresToken() {
		return $this->expiresToken;
	}
	
	/**
	 * @param  $expiresToken
	 */
	public function setExpiresToken( $expiresToken) {
		$this->expiresToken = $expiresToken;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getGender() {
		return $this->gender;
	}
	
	/**
	 * @param  $gender
	 */
	public function setGender( $gender) {
		$this->gender = $gender;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getTimezone() {
		return $this->timezone;
	}
	
	/**
	 * @param  $timezone
	 */
	public function setTimezone( $timezone) {
		$this->timezone = $timezone;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getLocale() {
		return $this->locale;
	}
	
	/**
	 * @param  $locale
	 */
	public function setLocale( $locale) {
		$this->locale = $locale;
		return $this;
	}
	
	/**
	 * @return the string
	 */
	public function getSignature() {
		return $this->signature;
	}
	
	/**
	 * @param  $signature
	 */
	public function setSignature( $signature) {
		$this->signature = $signature;
		return $this;
	}
	
    
    
}