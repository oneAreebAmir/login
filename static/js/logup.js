const form = document.getElementById('form');
const error = document.getElementById('error');
let root = document.querySelector(':root');

const pwd = document.getElementById('password');
const toggleBtn = document.getElementById('toggleBtn');

toggleBtn.onclick = () =>{
    if(pwd.type === 'password'){
        pwd.setAttribute('type','text');
        toggleBtn.classList.add('hide');
    }else{
        pwd.setAttribute('type','password');
        toggleBtn.classList.remove('hide');
    }
}

const c_pwd = document.getElementById('c_password');
const c_toggleBtn = document.getElementById('c_toggleBtn');

c_toggleBtn.onclick = () =>{
    if(c_pwd.type === 'password'){
        c_pwd.setAttribute('type','text');
        c_toggleBtn.classList.add('hide');
    }else{
        c_pwd.setAttribute('type','password');
        c_toggleBtn.classList.remove('hide');
    }
}

const lowerCase = document.getElementById('lowercase');
const upperCase = document.getElementById('uppercase');
const number = document.getElementById('number');
const character = document.getElementById('character');
const minlenght = document.getElementById('lenght');
const whitespace = document.getElementById('whitespace');

function checkPassword(data){
    const lower = new RegExp('(?=.*[a-z])');
    const upper = new RegExp('(?=.*[A-Z])');
    const digit = new RegExp('(?=.*[0-9])');
    const special = new RegExp('(?=.*[!@#\$%\^&\*])');
    const lenght = new RegExp('(?=.{8,})');

    if(lower.test(data)){
        lowerCase.classList.add('valid');
    }
    else{
        lowerCase.classList.remove('valid');
        
    }

    if(upper.test(data)){
        upperCase.classList.add('valid');
    }
    else{
        upperCase.classList.remove('valid');
    }

    if(digit.test(data)){
        number.classList.add('valid');
    }
    else{
        number.classList.remove('valid');
    }

    if(special.test(data)){
        character.classList.add('valid');
    }
    else{
        character.classList.remove('valid');
    }
    
    if(lenght.test(data)){
        minlenght.classList.add('valid');
    }
    else{
        minlenght.classList.remove('valid');
    }
      
    if(/\s/g.test(data)){
        whitespace.classList.remove('valid');
    }
    else{
        whitespace.classList.add('valid');
    }
}

function display_error(data){
    document.getElementById("error").innerText = data;
    document.getElementById('container').style.height = '650px';
    error.style.display = "flex";
    setTimeout(() =>{
        document.getElementById('container').style.height = '580px';
        error.style.display = "none";
    }, 2400);
}

const submit = document.getElementById('submit').addEventListener('click', (e)=>{
    e.preventDefault();

    const fname = document.getElementById('fname').value;
    const lname = document.getElementById('lname').value;
    const username = document.getElementById('username').value;
    const birthday = document.getElementById('birthday').value;
    const gender_select = document.getElementById('gender');
    const gender_option = gender_select.options[gender_select.selectedIndex];
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const c_password = document.getElementById('c_password').value;
    
    const date_created = new Date();

    const new_user = {fname:fname, lname:lname, username:username, birthday:birthday,gender:gender_option.text, email:email, password:password, date_created:date_created};

    const xhr = new XMLHttpRequest();

    xhr.open("POST","php/logup.php", true);

    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = () =>{
        if(xhr.status == 200 && xhr.readyState == 4){
            if(xhr.responseText){
                if(xhr.responseText == "success"){
                    document.getElementById('form').reset();
                    window.location = "verification.php";
                }
                else{
                    display_error(xhr.responseText);
                }
            }else{
                console.log('Console Error');
            }
        }
        else{
            console.log("Problem Occured");
        }
    }

    const json_new_user = JSON.stringify(new_user);

    var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(fname != "" && lname != "" && email != "" && username != "" && birthday != "" && password != "" && c_password != ""){
        if(email.match(validEmail)){
            if(lowerCase.classList == "valid" && upperCase.classList == "valid" && number.classList == "valid" && character.classList == "valid" && minlenght.classList == "valid" && whitespace.classList == "valid"){
                if(password == c_password){
                    xhr.send(json_new_user);
                }
                else{
                    display_error('Your passwords does not match')
                }
            }      
            else{
                display_error('Invalid Password')
            }   
        }
        else{
            display_error('Your Email must contain "@","." and domain')
        }        
    }
    else{
        display_error('Fill All Fields')
    }
})