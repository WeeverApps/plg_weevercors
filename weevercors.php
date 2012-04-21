<?php
/*	
*	Weever Apps Cross-Origin-Resource-Sharing (CORS) Connector
*	(c) 2012 Weever Apps Inc. <http://www.weeverapps.com/>
*
*	Author: 	Robert Gerald Porter <rob@weeverapps.com>
*	Version: 	0.1
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

	public function __construct(&$subject, $params) {

		parent::__construct( $subject, $params );

		header("Access-Control-Allow-Origin: 		http://weeverapp.com http://stage.weeverapp.com");
		header("Access-Control-Allow-Credentials: 	true");
		header("Access-Control-Allow-Headers: 		x-requested-with");
		header("Access-Control-Request-Method: 		GET,POST");
			
			
	}
		/* Deprecated..
		
	public function onAfterDispatch() {
				
		if(JRequest::getVar('wxtest') == 1) {
			echo "R"; die();
		}
		
		if( JRequest::getVar('jFormToken') ) { */
		/*
			header('Content-type: 	application/json');		
			header('Cache-Control: 	no-cache, must-revalidate');
			
			$session 					=& JFactory::getSession();
		
			$output 					= new stdClass();
			$callback 					= JRequest::getVar('callback');
			$output->results 			= array();
			$output->results[]->token	= JHTML::_( 'form.token' );
			
			$json				= json_encode($output);
			
			$json				= $callback . "(" . $json . ");";
			
			echo $json;*/
		/*	
			echo JHTML::_( 'form.token' );
			
			jexit();
		
		}
		
		if( JRequest::getVar('jSessionID') ) {
		
			$session 		= &JFactory::getSession();
			$sid 			= $session->getId();
			$sname			= $session->getName();
			
			echo $sname . "|" . $sid . "|" . JHTML::_( 'form.token' );
			
			jexit();
		
		}
		
		if ( JRequest::getVar('jCookie') ) 
		{
			
		*/	/*
			What this does:
			
				Mobile browsers by default are set not to accept third-party cookies. 
				This can prevent ad-tracking, but also prevents legitimate uses, like
				logging into a remote system. The below code is a workaround that will
				allow a domain that has been authorized by CORS to log in to Joomla.
			
			*/
		/*	
			?>
			
			<script type='text/javascript'>
			
				var submitCookie = function()	{
				
					document.forms["jCookieForm"].submit();
				
				}		
			
				window.addEventListener ? 
				window.addEventListener("load",submitCookie,false) : 
				window.attachEvent && window.attachEvent("onload",submitCookie);				
			
			</script>
			
			<form id="jCookieForm" action="index.php?jFormToken=1&jCorsRequest=1" method="post">
			
			</form>
			
			<?php
			
			jexit();
		
		}
		
	}
	
	*/

	
} 



