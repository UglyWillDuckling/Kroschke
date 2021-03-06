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
class Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type extends Customweb_TeleCash_Stubs_Org_W3_XMLSchema_String {
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type
	 */
	public static function FORCETICKET() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type::_()->set('forceTicket');
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type
	 */
	public static function E1_FORCETICKET() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type::_()->set('forceticket');
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type
	 */
	public static function BWLISTCHECK() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type::_()->set('BWListCheck');
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type
	 */
	public static function E1_BWLISTCHECK() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type::_()->set('bwlistcheck');
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type
	 */
	public static function SALE() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type::_()->set('sale');
	}
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type
	 */
	public static function _() {
		$i = new Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_V1_CustomerCardTxType_Type();
		return $i;
	}
	
}