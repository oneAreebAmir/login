
error = document.getElementById('image_error');

document.getElementById('submit').addEventListener('click', (e)=>{
    e.preventDefault();
    
    let form_data = new FormData();
    let img = document.getElementById('imgfile');
    if(img.files.length > 0){
        form_data.append('imagefile', img.files[0]);

        const xhr = new XMLHttpRequest();

        xhr.open("POST","php/image_profile.php", true);

    
        xhr.onload = () =>{
            if(xhr.status == 200 && xhr.readyState == 4){
                if(xhr.responseText){
                    error.innerText = xhr.responseText;
                    if(xhr.responseText == "success"){
                        error.innerText = "";
                        location.reload();
                    }
                    else if(xhr.responseText == "RTLIDTISO"){
                        error.innerText = "";
                        window.location = "login.php";
                    }
                }
            }
            else{
                console.log("Problem Occured");
            }
        }
    
        xhr.send(form_data);
    }else{
        error.innerText = "Please Select Image File";
    }
})


function loadFile(event){
    upload_file.src = URL.createObjectURL(event.target.files[0]);
    upload_file.onload = function() {
        URL.revokeObjectURL(upload_file.src) // free memory
    }
}