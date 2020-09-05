/**
 * Common Javascript functions (cm-js)
 */

$(document).ready(function () {
    /**
     * Input helpers
     */
    $('.cm-js-focus').focus();

    /**
     * Actions
     */
    $('.cm-js-close-alert').on('click', function () {
        $('.alert-container').remove();
    });
})
