<?php
namespace Application\Form;

use Zend\Form\Form;

class Cadastro extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->add(array(
            'name'=>'nomeNoiva',
            'attributes' => array(
                'type'=>'text',
                'class'=> 'form-control input-lg span8 required',
                'placeholder' => 'Nome da Noiva',
                'id' => 'nomeNoiva'
            ),
            'options'=> array(
                'label' => 'Nome da Noiva: ',

            ),
        ));


        $this->add(array(
            'name'=>'nomeNoivo',
            'attributes' => array(
                'type'=>'text',
                'class'=> 'form-control input-lg span8 required',
                'placeholder' => 'Nome do Noivo',
                'id' => 'nomeNoivo'
            ),
            'options'=> array(
                'label' => 'Nome do Noivo: ',

            ),
        ));


        $this->add(array(
            'name'=>'emailNoiva',
            'attributes' => array(
                'type'=>'text',
                'class'=> 'form-control input-lg span8 required',
                'placeholder' => 'email da Noiva',
                'id' => 'emailNoiva'
            ),
            'options'=> array(
                'label' => 'Email da Noiva: '
            ),
        ));

        $this->add(array(
            'name'=>'emailNoivo',
            'attributes' => array(
                'type'=>'text',
                'class'=> 'form-control input-lg span8 required',
                'placeholder' => 'Email do Noivo',
                'id' => 'nomeNoiva'
            ),
            'options'=> array(
                'label' => 'Email do Noivo: '
            ),
        ));

        $this->add(array(
            'name'=>'userName',
            'attributes' => array(
                'type'=>'text',
                'class'=> 'form-control input-lg span8 required',
                'placeholder' => 'Usuário',
                'id' => 'userName'
            ),
            'options'=> array(
                'label' => 'Usuário do Site: '
            ),
        ));

        $this->add(array(
            'name'=>'password',
            'attributes' => array(
                'type'=>'password',
                'class'=> 'form-control input-lg span8 required',
                'placeholder' => 'Senha',
                'id' => 'password'
            ),
            'options'=> array(
                'label' => 'Senha: '
            ),
        ));


        $this->add(array(
            'name'=>'passwordCheck',
            'attributes' => array(
                'type'=>'password',
                'class'=> 'form-control input-lg span8 required',
                'placeholder' => 'Repita a Senha',
                'id' => 'passwordCheck'
            ),
            'options'=> array(
                'label' => 'Repita a Senha: '
            ),
        ));

        $this->add(array(
            'name'=>'dataCasamento',
            'attributes' => array(
                'type'=>'text',
                'class'=> 'form-control input-lg span8 required',
                'placeholder' => 'dd/mm/yyyy',
                'id' => 'dataCasamento'
            ),
            'options'=> array(
                'label' => 'Data do Casamento: '
            ),
        ));


        $this->add(array(
            'name'=>'idPlano',
            'attributes' => array(
                'type'=>'hidden',
                'class'=> 'form-control input-lg required',
                  'id' => 'idPlano'
            ),
            'options'=> array(
                'label' => 'Plano Escolhido: '
            ),
        ));


        $this->add(array(
            'name'=>'role',
            'attributes' => array(
                'type'=>'hidden',
                'class'=> 'form-control input-lg required',
                'placeholder' => '',
                'id' => 'role',
                'value'=>'SYSUSER'
            ),
            'options'=> array(
                'label' => 'Role: '
            ),
        ));








    }
}