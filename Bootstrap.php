<?php 
class Shopware_Plugins_Backend_BackendBoilerplate_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
	public function getInfo()
	{
		return array(
				'label' => 'Backend Boilerplate';
		);
	}
	
	public function install()
	{
		$this->subscribeEvent(
			'Enlight_Controller_Dispatcher_ControllerPath_Backend_BackendBoilerplate',
			'getBackendController'	
		);
		
		$this->createMenuItem(array(
				'label' => 'Backend Boilerplate',
				'controller' => 'Backend Boilerplate',
				'class' => 'sprite-application-block',
				'action' => 'Index',
				'active' => 1,
				'parent' => $this->Menu()->findOneBy(['label' => 'Marketing'])
		));
		return true;
	}
	
	public function uninstall()
	{
		return true;
	}
	
	public function getBackendController(Enlight_Event_EventArgs $args)
	{
		$this->Application()->Template()->addTemplateDir(
			$this->Path() . 'Views/'	
		);
		
		$this->registerCustomModels();
		
		return $this->Path() . '/Controllers/Backend/Backend Boilerplate.php';
	}
}
?>
