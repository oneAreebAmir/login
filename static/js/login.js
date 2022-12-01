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

const error = document.getElementById('error');

document.getElementById('submit').addEventListener("click",login);
  
function login(e){ 
   e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    const xhr = new XMLHttpRequest();

    xhr.open("POST", "php/login.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onload= () =>{
        if(xhr.status == 200 && xhr.readyState == 4){
            if(xhr.responseText){
                if(xhr.responseText == "Successfully Login"){
                    window.location = "home.php";
                    document.getElementById('form').reset();
                }
                else{
                    document.getElementById("error").innerText = xhr.responseText;
                    document.getElementById('container').style.height = '370px';
                    error.style.display = "flex";
                    setTimeout(() =>{
                        error.style.display = "none";
                        document.getElementById('container').style.height = '330px';
                    }, 2000)
                }
            }
        }
        else{
            console.log("Problem Occured");
        }
    }

    const js_data = {email: email, password:password};

    const json_data = JSON.stringify(js_data);
    
    xhr.send(json_data);
}

document.getElementById('forget_pwd').addEventListener('click', (e)=>{
    e.preventDefault();

    window.location = 'forget/';
});