<?php
/*	
*	Weever Apps Cross-Origin-Resource-Sharing (CORS) Connector
*	(c) 2012 Weever Apps Inc. <http://www.weeverapps.com/>
*
*	Author: 	Robert Gerald Porter <rob@weeverapps.com>
*	Version: 	0.2
*   License: 	GPL v3.0
*
*   This extension is free software: you can redistribute it and/or modify
*   it under the terms of the GNU General Public License as published by
*   the Free Software Foundation, either version 3 of the License, or
*   (at your option) any later version.
*
*   This extension is distributed in the hope that it will be useful,
*   but WITHOUT ANY WARRANTY; without even the implied warranty of
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*   GNU General Public License for more details <http://www.gnu.org/licenses/>.
*
*/
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

class plgSystemWeeverCors extends JPlugin {

	public	$origin;

	public function __construct(&$subject, $params) {

		parent::__construct( $subject, $params );
		
		if( headers_sent() )
			return;
		
		$this->origin = $this->check_referer();

		header("Access-Control-Allow-Origin: " .	$this->origin);
		header("Access-Control-Allow-Credentials: 	true");
		header("Access-Control-Allow-Headers: 		x-requested-with");
		header("Access-Control-Request-Method: 		GET,POST");			
			
	}
	
	
	protected function check_referer() {
	
		$referer	= @$_SERVER['HTTP_ORIGIN']; // works on WebKit only.. all we need for now

		/* only allow *.weeverapp.com, weeverapp.com, or known custom URL */
		if( stripos( $referer, ".weeverapp.com" ) > -1 || $referer == "http://" . WeeverCorsHelper::getCustomAppDomain() )
			return $referer;
	
		return "http://weeverapp.com";
	
	}
	
} 

class WeeverCorsHelper {


	static public function getWeeverSettingsDB()
	{
	
		$db = &JFactory::getDBO();
			
		$query = 	"	SELECT	* ".
					"	FROM	#__weever_config ";
				
		$db->setQuery($query);
		$result = $db->loadObjectList();
		
		return $result;
	
	}

	
	static public function getCustomAppDomain()
	{
	
		$result = self::getWeeverSettingsDB();
	
		foreach((array)$result as $k=>$v)
		{
			if($v->option == "domain")
				return $v->setting;
		}
	
		return null;
	}

}

