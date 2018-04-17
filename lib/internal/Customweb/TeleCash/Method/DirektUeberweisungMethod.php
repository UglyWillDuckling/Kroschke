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
 *
 * @author nicoeigenmann
 * @Method(paymentMethods={'DirektUeberweisung'})
 */
class Customweb_TeleCash_Method_DirektUeberweisungMethod extends Customweb_TeleCash_Method_DefaultMethod {


	public function getAuthorizationParameters(Customweb_TeleCash_Authorization_Transaction $transaction, array $formData, $authorizationMethod) {
		$parameters = parent::getAuthorizationParameters($transaction, $formData, $authorizationMethod);
		$verification = $this->getPaymentMethodConfigurationValue('du_verification');
		switch ($verification) {
			case Customweb_TeleCash_IConstants::DU_VERIFICATION_AGE:
				$parameters['ident_actiontype'] = '4';
				break;
			case Customweb_TeleCash_IConstants::DU_VERIFICATION_IDENTIFICATION:
				$parameters['ident_actiontype'] = '5';
				break;
			case Customweb_TeleCash_IConstants::DU_VERIFICATION_AUTHENTICATION:
				$parameters['ident_actiontype'] = '6';
				break;
			case Customweb_TeleCash_IConstants::DU_VERIFICATION_BANKACCOUNT:
				$parameters['ident_actiontype'] = '7';
				break;
			case Customweb_TeleCash_IConstants::DU_VERIFICATION_NONE:
			default:
				break;
		}
		return $parameters;
	}

}
