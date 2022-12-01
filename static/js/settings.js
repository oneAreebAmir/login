const tbody = document.getElementById("tbody");
const profile_img = document.getElementById("profile_img");

const xhr = new XMLHttpRequest;
xhr.open("GET", "../php/settings.php", true);
xhr.responseType = "json";
xhr.onload = () =>{
    if(xhr.status == 200 && xhr.readyState == 4){
        if(xhr.response){
            x = xhr.response;
        }else{
            x = "";
        }
        for(i = 0;i < x.length; i++){
            tbody.innerHTML += "<tr><td>"+x[i].unique_id +"</td><td>"+x[i].fname+"</td><td>"+x[i].lname+"</td><td>"+x[i].email+"</td><td>"+x[i].birthday+"</td><td>"+x[i].gender+"</td><td><button value='Edit' id='edit_account' data-unique_id="+x[i].unique_id+">Edit</button></td></tr>";
            profile_img.src = document.getElementById('profile_img_1').src = "../resource/image/" + x[i].profile_img;
        }
    }else{
        console.log("Problem Occured");
    }
}
xhr.send();

document.getElementById('delete_btn_account').addEventListener('click', (e)=>{
    e.preventDefault();
    
    alert('Do you want to Delete your Account')
    alert('Confirm delete your Account');

    const xhr = new XMLHttpRequest();

    xhr.open('GET', '../php/delete_account.php', true);

    xhr.onload = () =>{
        if(xhr.status == 200 && xhr.readyState == 4){
            if(xhr.response){
                if(xhr.responseText = "success"){
                    document.getElementById('error').innerText = "";
                    window.location = "../logup.php";
                }
                else if(xhr.responseText = "RTLIDTISO"){
                    window.location = "login.php";
                }
                else{
                    document.getElementById("error").innerText = null;
                }
            }
        }else{
            console.log('Problem Occurred');
        }
    }

    xhr.send();
});