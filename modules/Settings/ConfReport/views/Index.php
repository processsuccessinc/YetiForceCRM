<?php

/**
 * Settings ConfReport index view class.
 *
 * @copyright YetiForce Sp. z o.o
 * @license   YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author    Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class Settings_ConfReport_Index_View extends Settings_Vtiger_Index_View
{
	public function process(\App\Request $request)
	{
		\App\Cache::clear();
		$viewer = $this->getViewer($request);
		$qualifiedModuleName = $request->getModule(false);
		$viewer->assign('ALL', \App\Utils\ConfReport::getAll());
		$viewer->assign('SYSTEM_INFO', Settings_ConfReport_Module_Model::getSystemInfo());
		$viewer->assign('MODULE', $qualifiedModuleName);
		$viewer->view('Index.tpl', $qualifiedModuleName);
	}
}
