$(function () {
    //check term and condition check box
    $('#btn-signup').attr('disabled', 'disabled');

    $('#terms').change(function () {
        if (this.checked) {
            $('#btn-signup').removeAttr('disabled');
        } else {
            $('#btn-signup').attr('disabled', 'disabled');
        }
    });

    //get JSON data of users' emails
    var items = [];
    $.getJSON('results.json', function (data) {
        $.each(data, function (key, val) {
            items.push(val);
        });
        console.log(items[0].user);
        console.log(items.length);
    });


    //add method to the JQuery validator
    $.validator.addMethod('check_email', function (value) {
        for (var i = 0; i < items.length; i++) {
            if (items[i].user === value) {
                return false;
            }
        }

        return true;
    });

    //validate the sign up email
    $('#signupform').validate({

        rules: {
            firstname: "required",
            lastname: "required",
            student_id: "required",
            address: "required",
            phone: "required",
            email: {
                required: true,
                email: true,
                check_email: true
            },

            password: {
                required: true,
                minlength: 5
            }
        },

        messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            student_id: "Please enter your Student ID",
            address: "Please enter your Address",
            phone: "Please enter your Phone",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                email: "Please enter a valid email address",
                check_email: "An account is already created with this email.<a>Forgor" +
                " Passwrod?</a>"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });


})



