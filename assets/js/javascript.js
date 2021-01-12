$(document).ready(() => {
    $("#login").submit(e => {
        e.preventDefault();

        $('.form-group').removeClass('has-error');
        $('.help-block').remove();

        let formData = {
            'email': $('input[name=email]').val(),
            'password': $('input[name=password]').val(),
        };

        $.post('backend/login.php', formData, data => {
            if (!data.success) {
                if (data.errors.email) {
                    let email_group = $('#email-group');
                    email_group.addClass('has-error');
                    email_group.append('<div class="help-block error formError">' + data.errors.email + '</div>');
                }

                if (data.errors.password) {
                    let password_group = $('#password-group');
                    password_group.addClass('has-error');
                    password_group.append('<div class="help-block error formError">' + data.errors.password + '</div>');
                }
            } else {
                $(location).attr('href', 'welcome');
            }
        }).fail(() => {
            $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
        });
    });

    $("#signup").submit(e => {
        e.preventDefault();

        $('.form-group').removeClass('has-error');
        $('.help-block').remove();

        let formData = {
            'name': $('input[name=name]').val(),
            'address': $('input[name=address]').val(),
            'email': $('input[name=email]').val(),
            'password': $('input[name=password]').val(),
        };

        $.post('backend/signup.php', formData, data => {
            if (!data.success) {
                if (data.errors.name) {
                    let name_group = $('#name-group');
                    name_group.addClass('has-error');
                    name_group.append('<div class="help-block error formError">' + data.errors.name + '</div>');
                }

                if (data.errors.address) {
                    let address_group = $('#address-group');
                    address_group.addClass('has-error');
                    address_group.append('<div class="help-block error formError">' + data.errors.address + '</div>');
                }

                if (data.errors.email) {
                    let email_group = $('#email-group');
                    email_group.addClass('has-error');
                    email_group.append('<div class="help-block error formError">' + data.errors.email + '</div>');
                }

                if (data.errors.password) {
                    let password_group = $('#password-group');
                    password_group.addClass('has-error');
                    password_group.append('<div class="help-block error formError">' + data.errors.password + '</div>');
                }
            } else {
                $(location).attr('href', 'welcome');
            }
        }).fail(() => {
            $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
        });
    });
});