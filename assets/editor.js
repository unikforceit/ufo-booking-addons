(function ($) {
    "use strict";

    var UfoGlobal = function ($scope, $) {

        // Js Start
        $('[data-background]').each(function () {
            $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
        });
        // Js End

    };


    var UfoBooking = function ($scope, $) {

        $scope.find('.booking-wrapper').each(function () {
            $(document).ready(function() {
                $('#booking-room-dropdown').change(function() {
                    var selectedOption = $(this).find('option:selected');
                    var regularPrice = selectedOption.data('regular-price').toString();
                    var salePrice = selectedOption.data('sale-price').toString();
                    var link = selectedOption.data('link');

                    // Identify the currency symbol
                    var currencySymbol = $(this).data('currency');

                    // Remove any commas for calculation, treating commas as decimal separators
                    var regularPriceClean = regularPrice.replace(',', '.').replace(/[^0-9.]/g, '');
                    var salePriceClean = salePrice.replace(',', '.').replace(/[^0-9.]/g, '');

                    // Convert the prices to floats for calculation
                    var regularPriceFloat = parseFloat(regularPriceClean);
                    var salePriceFloat = parseFloat(salePriceClean);
                    var savings = regularPriceFloat - salePriceFloat;

                    // Format savings to ensure two decimal places
                    var savingsFormatted = savings.toFixed(2).replace('.', ',');

                    // Update the text with the original prices including commas and the correct currency symbol
                    $('#booking-regular-price').text(currencySymbol + regularPrice);
                    $('#booking-sale-price').text(currencySymbol + salePrice);
                    $('#booking-savings-amount').text(currencySymbol + savingsFormatted);
                    $('#booking-book-button').attr('href', link);
                });

                // Trigger change event on page load to initialize values
                $('#booking-room-dropdown').trigger('change');
            });

            // Js End
        });

    };

    $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', UfoGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/ufo-booking-addons.default', UfoBooking);
    });
    console.log('addon js loaded');
})(jQuery);