
var errore=0;
function validatePassword() {
  var password = passwordInput.value;
  var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
  if (regex.test(password)) {
    const a=document.getElementById("password");
    a.style.borderBottom="2px solid green"
    var b=document.getElementById("requisiti");
    b.innerHTML="";
    return true;
  } else {
    const a=document.getElementById("password");
    a.style.borderBottom="2px solid red"
    var b=document.getElementById("requisiti");
    var c=document.createElement("br");
    b.style.fontSize="14px";
    b.style.color="red";
    b.textContent="La password non rispetta i requisiti minimi";
    b.appendChild(c);
    return false;
  }
}

function CorPass() {
    //console.log(passwordInput.value);
   // console.log(confpasswordInput.value);
    if(passwordInput.value===confpasswordInput.value){
        const a=document.getElementById("confpassword");
        a.style.borderBottom="2px solid green"
        var b=document.getElementById("confrequisiti");
        b.innerHTML="";
        return true;
    }else{
        const a=document.getElementById("confpassword");
        a.style.borderBottom="2px solid red"
        var b=document.getElementById("confrequisiti");
        var c=document.createElement("br");
        b.style.fontSize="14px";
        b.style.color="red";
        b.textContent="Le password non corrispondono";
        b.appendChild(c);
        return false;
    }
}


function validateEmail() {
    
    fetch("P11Libry.php?email="+email.value+"&funzione=validazionemail")
    .then(response => response.json())
    .then(data =>{
        const validEmail=data;
        if(validEmail==="true")
       {
            const a=document.getElementById("email");
            a.style.borderBottom="2px solid red"
           
            var b=document.getElementById("emailerr");
            var c=document.createElement("br");
            b.style.fontSize="14px";
            b.style.color="red";
            b.textContent="Utente già registrato";
            b.appendChild(c);
            errore=1;
            
        }else{
            const a=document.getElementById("email");
            a.style.borderBottom="2px solid green"
            var b=document.getElementById("emailerr");
            b.innerHTML="";
            errore=0;
            
        }
        //console.log(data);
        })
    .catch(error => console.error(error));
   
}
function Registrazione(event) {
    event.preventDefault();
    const formData = new FormData(form);
    if(validatePassword()==true || CorPass()==true)
    {
        
    fetch('P11Libry.php', {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Errore nella chiamata al server.');
        }
        return response.text();
      })
      .then(data => {
        //console.log(data);
       if(data==1){
        
        const label=document.getElementById("erroreRegistrazione");
        label.style.fontSize="14px";
        label.style.color="red";
        label.textContent="Le password non corrispondono o l'email è già esistente";
       }else{
        window.location.href = "Home.php";
       }
      
        
      })
      .catch(error => {
        console.error(error);
      });
    }else{
        const label=document.getElementById("erroreRegistrazione");
        label.style.fontSize="14px";
        label.style.color="red";
        label.textContent="Errore ricontrollare i dati prima di procedere con la registrazione";
      }
}



const passwordInput=document.getElementById("password");
passwordInput.addEventListener("blur", validatePassword);

const confpasswordInput=document.getElementById("confpassword");
confpasswordInput.addEventListener("blur", CorPass);

const email=document.getElementById("email");
email.addEventListener("blur",validateEmail);

const form=document.getElementById("Registrazione")
form.addEventListener("submit",Registrazione);