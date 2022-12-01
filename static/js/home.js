
const profile_img = document.getElementById("profile_img");

const xhr = new XMLHttpRequest;
xhr.open("GET","php/home.php", true);
xhr.responseType = "json";
xhr.onload = () =>{
    if(xhr.status == 200 && xhr.readyState == 4){
        if(xhr.response){
            x = xhr.response;
        }else{
            x = "";
        }
        for(i = 0;i < x.length; i++){
            profile_img.src = "resource/image/"+ x[i].profile_img;
        }
    }else{
        console.log("Problem Occured");
    }
}
xhr.send();
