function val(){
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (!email  && !password){
        alert('Please Fill both fields');
    }
    
    if (!email){
        alert('Enter a Username');
    }
    if (!password){
        alert('Enter a Password');
    }
}
