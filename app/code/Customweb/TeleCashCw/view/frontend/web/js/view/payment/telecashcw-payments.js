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
 *
 * @category	Customweb
 * @package		Customweb_TeleCashCw
 * 
 */

define([
	'uiComponent',
	'Magento_Checkout/js/model/payment/renderer-list'
], function(
	Component,
	rendererList
) {
	'use strict';
	
	rendererList.push(
			{
			    type: 'telecashcw_generic',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_generic-method'
			},
			{
			    type: 'telecashcw_creditcard',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_creditcard-method'
			},
			{
			    type: 'telecashcw_mastercard',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_mastercard-method'
			},
			{
			    type: 'telecashcw_visa',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_visa-method'
			},
			{
			    type: 'telecashcw_americanexpress',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_americanexpress-method'
			},
			{
			    type: 'telecashcw_diners',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_diners-method'
			},
			{
			    type: 'telecashcw_jcb',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_jcb-method'
			},
			{
			    type: 'telecashcw_directdebitssepa',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_directdebitssepa-method'
			},
			{
			    type: 'telecashcw_giropay',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_giropay-method'
			},
			{
			    type: 'telecashcw_maestro',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_maestro-method'
			},
			{
			    type: 'telecashcw_paypal',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_paypal-method'
			},
			{
			    type: 'telecashcw_clickandbuy',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_clickandbuy-method'
			},
			{
			    type: 'telecashcw_direktueberweisung',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_direktueberweisung-method'
			},
			{
			    type: 'telecashcw_sofortueberweisung',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_sofortueberweisung-method'
			},
			{
			    type: 'telecashcw_ideal',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_ideal-method'
			},
			{
			    type: 'telecashcw_klarnaopeninvoice',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_klarnaopeninvoice-method'
			},
			{
			    type: 'telecashcw_klarnainstallments',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_klarnainstallments-method'
			},
			{
			    type: 'telecashcw_masterpass',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_masterpass-method'
			},
			{
			    type: 'telecashcw_bcmc',
			    component: 'Customweb_TeleCashCw/js/view/payment/method-renderer/telecashcw_bcmc-method'
			});
	return Component.extend({});
});