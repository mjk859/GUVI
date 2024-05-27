$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        const formData = {
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.ajax({
            type: 'POST',
            url: 'php/login.php',
            data: formData,
            dataType: 'json',
            encode: true
        })
        .done(function(data) {
            window.location.href = 'profile.html';
        })
        .fail(function(data) {
            $('#message').html('<div class="alert alert-danger">' + data.responseJSON.message + '</div>');
        });
    });
});
