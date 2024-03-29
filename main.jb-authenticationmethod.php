<?php

/**
 * @copyright   Copyright (c) 2019-2024 Jeffrey Bostoen
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2.7.240208
 *
 * PHP Main file
 */
 
namespace jb_itop_extensions\authentication_method;

// iTop internals
use \iApplicationObjectExtension;
use \DBObjectSet;
use \DBSearch;
use \Dict;

// iTop classes
use \AuthenticationMethod;

class ApplicationObjectExtension_AuthenticationMethod implements iApplicationObjectExtension {
	 
	/**
	 * Invoked to determine whether an object can be written to the database 
	 *	
	 * The GUI calls this verb and reports any issue.
	 * Anyhow, this API can be called in other contexts such as the CSV import tool.
	 * 
	 * @param DBObject $oObject The target object
	 * @return string[] A list of errors message. An error message is made of one line and it can be displayed to the end-user.
	 */	
	public function OnCheckToWrite($oObject) {
		
		return $this->ValidateInput($oObject);
		
	}
	
	/**
	 * Invoked to determine whether an object has been modified in memory
	 *
	 *	The GUI calls this verb to determine the message that will be displayed to the end-user.
	 *	Anyhow, this API can be called in other contexts such as the CSV import tool.
	 *	
	 * If the extension returns false, then the framework will perform the usual evaluation.
	 * Otherwise, the answer is definitively "yes, the object has changed".	 	 	 
	 *	 
	 * @param DBObject $oObject The target object
	 * @return boolean True if something has changed for the target object
	 */	
	public function OnIsModified($oObject) {
		return false;
	}

	/**
	 * Invoked to determine whether an object can be deleted from the database
	 *	
	 * The GUI calls this verb and stops the deletion process if any issue is reported.
	 * 	 
	 * Please not that it is not possible to cascade deletion by this mean: only stopper issues can be handled. 	 
	 * 
	 * @param DBObject $oObject The target object
	 * @return string[] A list of errors message. An error message is made of one line and it can be displayed to the end-user.
	 */	
	public function OnCheckToDelete($oObject) {
		return Array();
		
	}

	/**
	 * Invoked when an object is updated into the database
	 *	
	 * The method is called right <b>after</b> the object has been written to the database.
	 * 
	 * @param DBObject $oObject The target object
	 * @param CMDBChange|null $oChange A change context. Since 2.0 it is fine to ignore it, as the framework does maintain this information once for all the changes made within the current page
	 * @return void
	 */	
	public function OnDBUpdate($oObject, $oChange = null) {
		
		return;
	}

	/**
	 * Invoked when an object is created into the database
	 *	
	 * The method is called right <b>after</b> the object has been written to the database.
	 * 
	 * @param DBObject $oObject The target object
	 * @param CMDBChange|null $oChange A change context. Since 2.0 it is fine to ignore it, as the framework does maintain this information once for all the changes made within the current page
	 * @return void
	 */	
	public function OnDBInsert($oObject, $oChange = null) {
		
		return;
	}

	/**
	 * Invoked when an object is deleted from the database
	 *	
	 * The method is called right <b>before</b> the object will be deleted from the database.
	 * 
	 * @param DBObject $oObject The target object
	 * @param CMDBChange|null $oChange A change context. Since 2.0 it is fine to ignore it, as the framework does maintain this information once for all the changes made within the current page
	 * @return void
	 */	
	public function OnDBDelete($oObject, $oChange = null) {
		
		return;
	}
	
	/**
	 * 
	 * Validates authentication method.
	 * 
	 * @param Object $oObject iTop object to validate	 * 
	 *  
	 * @return Array. Empty array if no errors, one or more messages if validation failed.
	 *  
	 */
	public function ValidateInput($oObject) {
		
		$aErrors = [];
		
		if($oObject instanceof AuthenticationMethod) {
			
			// Validate email address
			switch($oObject->Get('authentication_method')) {
				
				case 'email':
								
					if(!filter_var($oObject->Get('authentication_detail'), FILTER_VALIDATE_EMAIL)) {
					 
						$aErrors[] =Dict::S('Errors/AuthenticationMethod/InvalidEmail');
						
					}
				
				default:
					break;
					
			}
			
			
			// Prevent duplicates caused by case sensitivity
			$oSet = new DBObjectSet(DBSearch::FromOQL_AllData('
				SELECT AuthenticationMethod 
				WHERE 
					authentication_method = "'.$oObject->Get('authentication_method').'"
					AND authentication_detail LIKE "'.$oObject->Get('authentication_detail').'"
			'));
			
			if($oSet->Count() > 0) {
				$aErrors[] = Dict::S('Errors/AuthenticationMethod/DuplicateMethod');
			}
		}
		
		
		// No errors		
		return [];
		
	}
	
}

