
//-------------Funzione aggiornamento commenti--------------
function aggiornaCommenti(id) {
    const CommentiDiv=document.getElementById(id+"div");
    fetch("AggiornaCommenti.php?id="+id).then(response => response.json())
    .then(data =>{
      // console.log(data);
      
      if(data[0]==="Nessun risultato trovato.")
      {
        CommentiDiv.style.border="1px solid white";
      }else{  
        CommentiDiv.style.border="0";
        CommentiDiv.innerHTML="";
        for (var i = 0; i < data.length; i++) {
          var arrayInterno = data[i];
          var ContenitoreCommento=document.createElement("p");
          var Email=document.createElement("h5");
          var Commento=document.createElement("h6");
          var Data=document.createElement("h7");
          Email.innerHTML=arrayInterno.email;
          Commento.innerHTML=arrayInterno.commento;
          Data.innerHTML=arrayInterno.data;
          ContenitoreCommento.classList="SpanCommenti";
          ContenitoreCommento.appendChild(Email);
          ContenitoreCommento.appendChild(Commento);
          ContenitoreCommento.appendChild(Data);
         
          CommentiDiv.appendChild(ContenitoreCommento);
          CommentiDiv.scrollTop = CommentiDiv.scrollHeight;
        }
      }
    })
  }
  
  //--------Funzione invio commento-------------
  function invioCommento()
  {
   
   var TextCommento=document.getElementById(this.id+"commento");
   //console.log(TextCommento.value);
      fetch("AddCommento.php?commento="+TextCommento.value+"&id="+this.id).then(response => response.json())
      .then(data =>{
        TextCommento.value="";
        aggiornaCommenti(this.id);
       
      })
  }
  //----------Funzioni per gestire il like-------------
  function AggiornaLike(id) {
    var id_c=id+"like";
    var LikeElement = document.querySelector('img[name="'+id_c+'"]');
    
    fetch("CheckLike.php?id="+id).then(response => response.json())
    .then(data =>{
      if(data){
        LikeElement.style.border="1px solid green";
      }else{
        LikeElement.style.border="1px solid white";
      }
    });
    return;
  }
    function Aggiungi_Rimuovi_Like(){
     
      fetch("Aggiungi_Rimuovi_Like.php?id="+this.id).then(response => response.json())
      .then(data =>{
        AggiornaLike(this.id);
        
      })
    }
  // -------------Gestione Preferiti---------
  function AggiornaPreferiti(id) {
    var id_c=id+"preferito";
    var PrefeElement = document.querySelector('img[name="'+id_c+'"]');
    
    fetch("CheckPreferiti.php?id="+id).then(response => response.json())
    .then(data =>{
      if(data){
        PrefeElement.src="img/CuorePrefe.png"
      }else{
        PrefeElement.src="img/cuore.png"
      }
    });
    
    return;
  }
  
  function Aggiungi_Rimuovi_Preferiti(){
    fetch("Aggiungi_Rimuovi_Preferiti.php?id="+this.id).then(response => response.json())
    .then(data =>{
     //console.log("AggiRL"+data);
      AggiornaPreferiti(this.id);
      
    })
  }