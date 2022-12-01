document.getElementById('submit').addEventListener("click", (e) => { 
   e.preventDefault();

    const verification_code = document.getElementById("verification_code").value;

    const xhr = new XMLHttpRequest();

    xhr.open("POST", "php/verification.php", true);

    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onload= () =>{
        if(xhr.status == 200 && xhr.readyState == 4){
            if(xhr.responseText){
                if(xhr.responseText == "success"){
                    document.getElementById('error').innerText = "";
                    document.getElementById('form').reset();
                    window.location = "image_profile.php";
                }
                else if(xhr.responseText == "RTLIDTISO"){
                    document.getElementById('error').innerText = "";
                    window.location = "login.php";
                }
                else{
                    document.getElementById("error").innerText = xhr.responseText;
                    document.getElementById('container').style.height = '370px';
                    error.style.display = "flex";
                    setTimeout(() =>{
                        error.style.display = "none";
                        document.getElementById('container').style.height = '310px';
                    }, 2000);
                }
            }
        }
        else{
            console.log("Problem Occured");
        }
    }

    const js_data = {verification_code: verification_code};

    const json_data = JSON.stringify(js_data);
    
    xhr.send(json_data);
});