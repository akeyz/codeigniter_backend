var FormValidation = function () {

    var handleValidation = function() {
        var form = $('.form-horizontal');
        var errorEl = $('.alert-error', form);
        var successEl = $('.alert-success', form);

        form.validate({
            errorElement: 'span',
            errorClass: 'help-inline',
            focusInvalid: false,

            errorPlacement: function (error, element) {
                if (element.attr("name") == "promote_type") {
                    error.css('margin-top', '0').insertAfter("#promote_type");
                } if (element.attr("name") == "language") {
                    error.insertAfter("#language");
                } else {
                    error.insertAfter(element);
                }
            },

            invalidHandler: function (event, validator) {           
                successEl.hide();
                errorEl.show();
                App.scrollTo(errorEl, -200);
            },

            highlight: function (element) {
                $(element).closest('.help-inline').removeClass('ok');
                $(element).closest('.control-group').removeClass('success').addClass('error'); 
            },

            unhighlight: function (element) {
                $(element).closest('.control-group').removeClass('error');
            },

            success: function (label) {
                label.addClass('valid').addClass('help-inline ok').closest('.control-group').removeClass('error').addClass('success');
            },

            // submitHandler: function (form) {
            //     successEl.show();
            //     errorEl.hide();
            // }
        });
    }

    return {
        //main function to initiate the module
        init: function () {

            handleValidation();

        }

    };

}();