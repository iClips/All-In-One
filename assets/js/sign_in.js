document.getElementById('sign-in-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const formData = new FormData(this);
    formData.append('csrf_token', csrfToken);
    fetch('/api/sign_in.php', {
        method: 'POST',
        body: formData,
        credentials: 'include' // Send cookies
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'dashboard.html';
        } else {
            alert(data.message);
        }
    });
});