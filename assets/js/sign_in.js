document.getElementById('sign-in-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('api/sign_in.php', {
        method: 'POST',
        body: formData,
        credentials: 'include' // Send cookies
    })
    .then(response => response.json())
    .then(data => {
        console.log(JSON.stringify(data));
        if (data.success) {
            window.location.href = 'dashboard.php';
        } else {
            alert(data.message);
        }
    });
});