$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: 'php/profile.php',
        dataType: 'json',
        encode: true
    })
    .done(function(data) {
        const profileHtml = `
            <p><strong>Username:</strong> ${data.username}</p>
            <p><strong>Email:</strong> ${data.email}</p>
            <p><strong>Registered on:</strong> ${new Date(data.created_at.$date).toLocaleString()}</p>
        `;
        $('#profile').html(profileHtml);
    })
    .fail(function(data) {
        $('#profile').html('<div class="alert alert-danger">Failed to load profile data.</div>');
    });
});
