document.getElementById('sign-in-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const feedbackElement = document.getElementById('feedback');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const formData = new FormData(this);
    
    const username = formData.get('username');
    const password = formData.get('password');
    if (username === '' || password === '') {
        feedbackElement.textContent = 'Kindly fill in both username and password fields.';
        return;
    }
    
    formData.append('csrf_token', csrfToken);
    
    fetch('api/sign_in.php', {
        method: 'POST',
        body: JSON.stringify(formData),
        credentials: 'include' // Send cookies
    })
    .then(response => response.json())
    .then((data) => {
        if (data.success) {
            feedbackElement.textContent = 'Sign in successful! Redirecting...';
            feedbackElement.style.color = 'green';
            setTimeout(() => {
                window.location.href = "dashboard.html";
            }, 500);
        } else {
            // Sign-in failed, display error message
            feedbackElement.textContent = data.error;
        }
    })
    .catch((error) => {
        feedbackElement.textContent = 'There was an error submitting the form.';
    });
});