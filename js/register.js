$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        const formData = {
            username: $('#username').val(),
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.ajax({
            type: 'POST',
            url: 'php/register.php',
            data: formData,
            dataType: 'json',
            encode: true
        })
        .done(function(data) {
            $('#message').html('<div class="alert alert-success">' + data.message + '</div>');
        })
        .fail(function(data) {
            $('#message').html('<div class="alert alert-danger">' + data.responseJSON.message + '</div>');
        });
    });
});
