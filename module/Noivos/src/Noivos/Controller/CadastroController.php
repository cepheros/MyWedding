<?php
/**
 * CadastroController
 *
 * PHP version 5.4
 *
 * @category   MyWedding
 * @package    Noivos
 * @subpackage Cadastro
 * @author     Daniel Chaves <daniel@danielchaves.com.br>
 * @license    http://mywedding.com.br/licence MIT
 * @link       none
 */

namespace Noivos\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;

class CadastroController extends ActionController
{

    public function indexAction()
    {

    }

    public function novoAction()
    {

        $users = new \Core\Entity\Site\Users();
        $form = new \Application\Form\Cadastro();
        $request = $this->getRequest();

        if($request->isPost()){
            $data = $request->getPost();
            $form->setInputFilter($users->getInputFilter());
            $form->setData($data);

            if($form->isValid()){

                $em = $this->getEntityManager()->getRepository('Core\Entity\Site\Users');
                $data = get_object_vars($data);
                $data['password'] = sha1(md5($data['password']));
                $data['dataCasamento'] = \DateTime::createFromFormat('d/m/Y',$data['dataCasamento']);
                $users->populate($data);
                $this->getEntityManager()->persist($users);
                $this->getEntityManager()->flush();
                $this->getService('Zend\Log')->info("Novo Usuário Criado no Sistema");
                return $this->redirect()->toUrl('/noivos/index/login/new/true');
            }else{
            return new ViewModel(array(
                    'form'=>$form,
                    'messages' => $form->getMessages(),
                ));
            }
        }else{
            return $this->redirect()->toUrl('/');
        }

    }

}