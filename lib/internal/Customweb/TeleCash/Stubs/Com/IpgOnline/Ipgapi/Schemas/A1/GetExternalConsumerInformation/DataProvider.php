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
 * @XmlType(name="DataProvider", namespace="http://ipg-online.com/ipgapi/schemas/a1")
 */ 
class Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_A1_GetExternalConsumerInformation_DataProvider extends Customweb_TeleCash_Stubs_Org_W3_XMLSchema_String {
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_A1_GetExternalConsumerInformation_DataProvider
	 */
	public static function BRGEL() {
		return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_A1_GetExternalConsumerInformation_DataProvider::_()->set('Bürgel');
	}
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * @return Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_A1_GetExternalConsumerInformation_DataProvider
	 */
	public static function _() {
		$i = new Customweb_TeleCash_Stubs_Com_IpgOnline_Ipgapi_Schemas_A1_GetExternalConsumerInformation_DataProvider();
		return $i;
	}
	
}