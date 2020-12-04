# jb-authenticationmethod
Copyright (C) 2019-2020 Jeffrey Bostoen

[![License](https://img.shields.io/github/license/jbostoen/iTop-custom-extensions)](https://github.com/jbostoen/iTop-custom-extensions/blob/master/license.md)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/jbostoen)
🍻 ☕

Need assistance with iTop or one of its extensions?  
Need custom development?  
Please get in touch to discuss the terms: **jbostoen.itop@outlook.com**

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

## Cookbook

XML:
* add AttributeLinkedSet to UserLocal
* add new class AuthenticationMethod

PHP:
* input validation (checks validity of email address)


