<?php

namespace Core\Entity\System;

use Core\Model\OrmEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity
 * @ORM\Table(name="tblsystem_users")
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
     * @ORM\Column(type="string",length=150)
     * @var string
     */

    protected $fullName;

    /**
     * @ORM\Column(type="string",length=50)
     * @var string
     */

    protected $userName;

    /**
     * @ORM\Column(type="string",length=25,unique=true)
     * @var string
     */

    protected $password;

    /**
     * @ORM\Column(type="string",length=25)
     * @var integer
     */

    protected $role;

    /**
     * @ORM\Column(type="string",length=150)
     * @var string
     */

    protected $userEmail;

    /**
     * @ORM\Column(type="string",length=80)
     * @var string
     */

    protected $phoneNumber;

    /**
     * @ORM\Column(type="datetime")
     * @var string
     */

    protected $dateCreated;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     * @var string
     */

    protected $dateLastLogin;

    /**
     * @ORM\Column(type="string",length=80)
     * @var string
     */

    protected $ipLastLogin;

    /**
     * @ORM\Column(type="text",nullable=true)
     *
     * @var string
     */

    protected $userSignature;

    /**
     * @ORM\Column(type="integer",nullable=true)
     * @var integer
     */

    protected $recoveryPass;

    public function getId()
    {
        return $this->id;
    }

    public function setId(integer $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName(string $userName)
    {
        $this->userName = $userName;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole(integer $role)
    {
        $this->role = $role;

        return $this;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setDateCreated(string $dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateLastLogin()
    {
        return $this->dateLastLogin;
    }

    public function setDateLastLogin(string $dateLastLogin)
    {
        $this->dateLastLogin = $dateLastLogin;

        return $this;
    }

    public function getIpLastLogin()
    {
        return $this->ipLastLogin;
    }

    public function setIpLastLogin(string $ipLastLogin)
    {
        $this->ipLastLogin = $ipLastLogin;

        return $this;
    }

    public function getUserSignature()
    {
        return $this->userSignature;
    }

    public function setUserSignature(string $userSignature)
    {
        $this->userSignature = $userSignature;

        return $this;
    }

    public function getRecoveryPass()
    {
        return $this->recoveryPass;
    }

    public function setRecoveryPass(integer $recoveryPass)
    {
        $this->recoveryPass = $recoveryPass;

        return $this;
    }

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
                    'name'     => 'userName',
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
                                            'max'      => 25,
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
                                            'min'      => 1,
                                            'max'      => 25,
                                    ),
                            ),
                    ),
            )));

            $inputFilter->add($factory->createInput(array(
                    'name'     => 'fullName',
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
                                            'max'      => 25,
                                    ),
                            ),
                    ),
            )));

            $inputFilter->add($factory->createInput(array(
                    'name'     => 'userEmail',
                    'required' => true,
                    'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                            array(
                                    'name'    => 'EmailAddress',
                            ),
                    ),
            )));

            $inputFilter->add($factory->createInput(array(
                    'name'     => 'phoneNumber',
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
                                            'max'      => 25,
                                    ),
                            ),
                    ),
            )));

            $inputFilter->add($factory->createInput(array(
                    'name'     => 'dateLastLogin',
                    'required' => false,
                    'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                    ),

            )));

            $inputFilter->add($factory->createInput(array(
                    'name'     => 'dateCreated',
                    'required' => false,
                    'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                    ),

            )));

            $inputFilter->add($factory->createInput(array(
                    'name'     => 'ipLastLogin',
                    'required' => false,
                    'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                    ),

            )));

            $inputFilter->add($factory->createInput(array(
                    'name'     => 'userSignature',
                    'required' => true,
                    'validators' => array(
                            array(
                                    'name'    => 'StringLength',
                                    'options' => array(
                                            'encoding' => 'UTF-8',
                                            'min'      => 1,
                                            'max'      => 2000,
                                    ),
                            ),
                    ),
            )));

            $inputFilter->add($factory->createInput(array(
                    'name' => 'recoveryPass',
                    'required '=> false,
                    'filters' => array(
                            array('name' => 'Int')
                    ),

            )));

        }
    }

}
