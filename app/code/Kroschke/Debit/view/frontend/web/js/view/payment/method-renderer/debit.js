/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*browser:true*/
/*global define*/
define(
    [
        'Payone_Core/js/view/payment/method-renderer/debit-method',
        'Magento_Ui/js/model/messageList',
        'mage/translate'
    ],
    function (Component, messageList, $t) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'Kroschke_Debit/payment/form',
                transactionResult: ''
            },

            getCode: function() {
                return 'kroschke_debit';
            },


            validate: function () {
                if (document.getElementById(this.getCode() + '_country').value == '') {
                    this.messageContainer.addErrorMessage({'message': $t('Please choose the bank country.')});
                    return false;
                }
                if (this.iban() == '') {
                    this.messageContainer.addErrorMessage({'message': $t('Please enter a valid IBAN.')});
                    return false;
                }

                return true;
            },

            getInstructions: function () {
                return window.checkoutConfig.payment.instructions[this.item.method];
            },

            getCountries: function () {
                return window.checkoutConfig.payment.kroschke_debit.sepaCountries;
            },

            getTransactionResults: function() {
                return _.map(window.checkoutConfig.payment.kroschke_debit.transactionResults, function(value, key) {
                    return {
                        'value': key,
                        'transaction_result': value
                    }
                });
            }
        });
    }
);