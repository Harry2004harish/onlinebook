//Scren toogle
searchForm = document.querySelector(' .search-form');

document.querySelector('#search-btn').onclick =()=>{
    searchForm.classList.toggle('active');
}

let loginForm = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
}



window.onscroll = () =>{
    
    searchForm.classList.remove('active');

    if(window.scrollY > 80){
        document.querySelector(' .header .header-2').classList.add('active');
    }else{
        document.querySelector(' .header .header-2').classList.remove('active');
    }
}

window.onload = () =>{
    if(window.scrollY > 80){
        document.querySelector(' .header .header-2').classList.add('active');
    }else{
        document.querySelector(' .header .header-2').classList.remove('active');
    }
}


// registeruser-

const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmpassword = document.getElementById('confirmpassword');

form.addEventListener('submit', e => {
    e.preventDefault();

    checkInputs();
});

function checkInputs(){
    //trim to remove the whitespaces
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const confirmPasswordValue = confirmpassword.value.trim();

    if(usernameValue === ''){
        //show error
        //add error class
        setErrorFor(username, 'username cannot be black');
    }else{
        //add success class
        setSuccessFor(username);
    }

    if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}

    if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank');
	} else {
		setSuccessFor(password);
	}

    if(confirmPasswordValue === '') {
		setErrorFor(confirmpassword, 'Password2 cannot be blank');
	} else if(passwordValue !== password2Value) {
		setErrorFor(confirmpassword, 'Passwords does not match');
	} else{
		setSuccessFor(confirmpassword);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}






