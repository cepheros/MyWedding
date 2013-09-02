<?php 

namespace Core\Service\Auth;

use Core\Service\Service;

class Admin extends Service
{
	/**
	 * Adapter usado para a autenticação
	 * @var Zend\Db\Adapter\Adapter
	 */
	private $dbAdapter;
	
	/**
	 * Construtor da classe
	 *
	 * @return void
	 */
	public function __construct($dbAdapter = null)
	{
		$this->dbAdapter = $dbAdapter;
	}
	
	/**
	 * Faz a autenticação dos usuários
	 *
	 * @param array $params
	 * @return array
	 */
	public function authenticate($params)
	{
		if (!isset($params['userName']) || !isset($params['password'])) {
			throw new \Exception("Parâmetros inválidos");
		}
	
		$password = sha1(md5($params['password']));
		$auth = new AuthenticationService();
		$authAdapter = new AuthAdapter($this->dbAdapter);
		$authAdapter
		->setTableName('tblsystem_users')
		->setIdentityColumn('userName')
		->setCredentialColumn('password')
		->setIdentity($params['userName'])
		->setCredential($password);
		$result = $auth->authenticate($authAdapter);
	
		if (! $result->isValid()) {
			throw new \Exception("Login ou senha inválidos");
		}
	
		//salva o user na sessão
		$session = $this->getServiceManager()->get('Session');
		$session->offsetSet('user', $authAdapter->getResultRowObject());
	
		return true;
	}
	
	/**
	 * Faz o logout do sistema
	 *
	 * @return void
	 */
	public function logout() {
		$auth = new AuthenticationService();
		$session = $this->getServiceManager()->get('Session');
		$session->offsetUnset('user');
		$auth->clearIdentity();
		return true;
	}
	
	/**
	 * Faz a autorização do usuário para acessar o recurso
	 * @param string $moduleName Nome do módulo sendo acessado
	 * @param string $controllerName Nome do controller
	 * @param string $actionName Nome da ação
	 * @return boolean
	 */
	public function authorize($moduleName, $controllerName, $actionName)
	{
		$auth = new AuthenticationService();
		$role = 'visitante';
		if ($auth->hasIdentity()) {
			$session = $this->getServiceManager()->get('Session');
			$user = $session->offsetGet('user');
			$role = $user->role;
		}
	
		$resource = $controllerName . '.' . $actionName;
		$acl = $this->getServiceManager()->get('Core\Acl\Builder')->build();
		if ($acl->isAllowed($role, $resource)) {
			return true;
		}
		return false;
	}
	
	
	
	
}
	

	
