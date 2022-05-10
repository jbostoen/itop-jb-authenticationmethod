# jb-authenticationmethod

Copyright (c) 2019-2022 Jeffrey Bostoen

[![License](https://img.shields.io/github/license/jbostoen/iTop-custom-extensions)](https://github.com/jbostoen/iTop-custom-extensions/blob/master/license.md)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/jbostoen)
🍻 ☕

Need assistance with iTop or one of its extensions?  
Need custom development?  
Please get in touch to discuss the terms: **info@jeffreybostoen.be** / https://jeffreybostoen.be

## What?
Adds an authentication methods tab to UserLocal. Can easily be extended to support all sorts of data. 

Dropdown to pick method (e.g. token, twitter_id, facebook_id, ...) and enter a value in a singleline text input field (255 chars)
This class is meant to be extended to integrate with other applications.

The fields are:
* user_id
* authentication_method
* authentication_detail

The combination of authentication_method and authentication_detail must always be unique.
For simple passwords, use iTop's native user password.

Note that programatically speaking, it might be best to consider that it's possible to 
have duplicates due to uniqueness not taking case sensitivity in mind.

## Note

The authentication method has been defined as a subclass of cmdbAbstractObject to allow privileged iTop users to create and edit this.  
However, the history has been disabled, since some fields would be updated very often.  

It could very well have been a direct subclass of DBObject instead, which would prohibit editing this class in iTop.


## Cookbook

XML:
* add AttributeLinkedSet to UserLocal
* add new class AuthenticationMethod



