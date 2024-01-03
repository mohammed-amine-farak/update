document.getElementById('send').addEventListener('click', function(event) {
    let email = document.getElementById('email').value;
    let name = document.getElementById('name').value;
    let nameRegex = /^[a-zA-Z]+$/; 
    let emailRegex = /\w+@gmail\.(com)$/;

    if (!email.match(emailRegex) || !name.match(nameRegex)) {
        window.alert('Invalid email or name');
        event.preventDefault();
    }
});
