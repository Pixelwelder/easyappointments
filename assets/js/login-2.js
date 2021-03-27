$(function () {
    'use strict';

    console.log('HERE WE GO');

    var onMessage = function(event){
        if (event.data.type === 'login') {
            $('#username').val(event.data.username);
            $('#password').val(event.data.password);
            onLoginFormSubmit({ preventDefault: function() {} });
        }
    }
    window.addEventListener('message', onMessage, false);

    var $loginForm = $('#login-form');

    function notify(message) {
        if (parent) parent.postMessage(message, '*');
        if (window.opener) window.opener.postMessage(message, '*');
    }

    /**
     * Login Button "Click"
     *
     * Make an ajax call to the server and check whether the user's credentials are right.
     * If yes then redirect him to his desired page, otherwise display a message.
     */
    function onLoginFormSubmit(event) {
        event.preventDefault();

        var url = GlobalVariables.baseUrl + '/index.php/user/ajax_check_login';

        var data = {
            'csrfToken': GlobalVariables.csrfToken,
            'username': $('#username').val(),
            'password': $('#password').val()
        };

        var $alert = $('.alert');

        $alert.addClass('d-none');

        $.post(url, data)
            .done(function (response) {
                if (response === GlobalVariables.AJAX_SUCCESS) {
                    notify({ type: 'scheduler-login-logged-in', value: true });
                    window.location.href = GlobalVariables.destUrl;
                } else {
                    notify({ type: 'scheduler-login-logged-in', value: false });
                    $alert.text(EALang['login_failed']);
                    $alert
                        .removeClass('d-none alert-danger alert-success')
                        .addClass('alert-danger');
                }
            });
    }

    $loginForm.on('submit', onLoginFormSubmit);

    // Let the parent page know we're here.
    notify({ type: 'scheduler-login-ready', value: true });
});
