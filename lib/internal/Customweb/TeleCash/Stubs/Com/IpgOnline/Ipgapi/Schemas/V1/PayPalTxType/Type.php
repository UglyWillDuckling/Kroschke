<?php
/**
 * You are allowed to use this API in your web application.
 *
 * Copyright (C) 2018 by customweb GmbH
 *
 * This program is licenced under the customweb software licence. With the
 * purchase or the installation of the software in your application you
 * accept the licence agreement. The allowed usage is outlined in the
 * customweb software licence which can be found under
 * http://www.sellxed.com/en/software-license-agreement
 *
 * Any modification or distribution is strictly forbidden. The license
 * grants you the installation in one application. For multiuse you will need
 * to purchase further licences at http://www.sellxed.com/shop.
 *
 * See the customweb software licence agreement for more details.
 *
*/

/**
 * @XmlType(name="Type", namespace="http://ipg-online.com/ipgapi/schemas/v1")
 */ 
class Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type extends Customweb_TeleCash_Stubs_Org_W3_XMLSchema_String {
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type
	 */
	public static function CREDIT() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type::_()->set('credit');
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type
	 */
	public static function POSTAUTH() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type::_()->set('postAuth');
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type
	 */
	public static function E1_POSTAUTH() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type::_()->set('postauth');
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type
	 */
	public static function CONSTANT_RETURN() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type::_()->set('return');
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type
	 */
	public static function VOID() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type::_()->set('void');
	}
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type
	 */
	public static function _() {
		$i = new Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_PayPalTxType_Type();
		return $i;
	}
	
}