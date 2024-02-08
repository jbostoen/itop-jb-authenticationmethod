<?php

/**
 * @copyright   Copyright (c) 2019-2024 Jeffrey Bostoen
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * Localized data
 */
 
Dict::Add('DE DE', 'German', 'Deutsch', array(

	//	'Class:SomeClass' => 'Class name',
	//	'Class:SomeClass+' => 'More info on class name',
	//	'Class:SomeClass/Attribute:some_attribute' => 'your translation for the label',
    //	'Class:SomeClass/Attribute:some_attribute/Value:some_value' => 'your translation for a value',
    //	'Class:SomeClass/Attribute:some_attribute/Value:some_value+' => 'your translation for more info on the value',
		
	'Class:Person/Attribute:contact_methods' => 'Authentifizierungsmethoden',
	
	'Class:AuthenticationMethod/Attribute:user_id' => 'iTop Benutzer',
	'Class:AuthenticationMethod/Attribute:authentication_method' => 'Authentifizierungsmethode',
	'Class:AuthenticationMethod/Attribute:authentication_method/Value:email' => 'Email',
	'Class:AuthenticationMethod/Attribute:authentication_method/Value:facebook_id' => 'Facebook ID',
	'Class:AuthenticationMethod/Attribute:authentication_method/Value:twitter_id' => 'Twitter ID',
	'Class:AuthenticationMethod/Attribute:authentication_method/Value:token' => 'Token',
	'Class:AuthenticationMethod/Attribute:authentication_detail' => 'Authentifizierungsdetails',
	'Class:AuthenticationMethod/Attribute:first_used' => 'Zuerst benutzt',
	'Class:AuthenticationMethod/Attribute:last_used' => 'Zuletzt benutzt',
	
	'Errors/AuthenticationMethod/InvalidEmail' => 'Falsche E-Mail Adresse.',
	'Errors/AuthenticationMethod/Duplicate' => 'Doppelte Authentifizierungsmethode (Groß-/Kleinschreibung beachten!).',
	
));

