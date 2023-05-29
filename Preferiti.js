var PrimoAvvio=true;
if(PrimoAvvio){
  CaricaHome();
  PrimoAvvio=false;
}

function CaricaHome(){
  const homepage=document.getElementById("homepage");
  fetch('ReturnPostPrefe.php')
    .then(response => response.json())
    .then(data => {
      // Decodifica l'immagine dalla risposta JSON
      //console.log(data);
      for (var i = 0; i < data.length; i++) {
          var arrayInterno = data[i];
          const imageData = atob(arrayInterno.image);

          // Converti i dati dell'immagine in un array di byte
          const byteCharacters = imageData.split('').map(char => char.charCodeAt(0));
          const byteArray = new Uint8Array(byteCharacters);

          // Crea un oggetto Blob dall'array di byte
          const blob = new Blob([byteArray], { type: 'image/jpeg' });

          // Crea un URL oggetto per l'immagine
          const imageUrl = URL.createObjectURL(blob);

          // Usa l'URL dell'immagine come desiderato (es. assegnalo a un elemento <img>)
          var img=document.createElement("img");
          var Titolo=document.createElement("h3");
          var Descrizione=document.createElement("h7");
          var divisore=document.createElement("div");
          var SXcontenitoreIN=document.createElement("div");
          var DXcontenitoreIN=document.createElement("div");
          var contenitoreOUT=document.createElement("div");
          var barra=document.createElement("div");
          var commenti=document.createElement("div");
          var cuore=document.createElement("img");
          commenti.classList="DivCommenti";
          DXcontenitoreIN.classList="contenitoreIN";
          SXcontenitoreIN.classList="contenitoreIN";
          var like=document.createElement("img");
          var send=document.createElement("img");
          like.classList="like";
          like.src="img/like.png";
          send.classList="like";
          send.src="img/send.png";
          like.style.cursor = "pointer";
          cuore.src="img/cuore.png";
          cuore.style.cursor="pointer";
          cuore.style.width="45px";
          
          like.style.padding="1px";
          send.style.cursor = "pointer";

          like.addEventListener("click",Aggiungi_Rimuovi_Like);
          send.addEventListener("click",invioCommento);
          cuore.addEventListener("click",Aggiungi_Rimuovi_Preferiti);

          var textBox=document.createElement("textarea");
          textBox.rows="3";
          textBox.classList="ins";
          textBox.placeholder="Commenta";
          like.setAttribute("name",arrayInterno.id+"like");
          cuore.setAttribute("name",arrayInterno.id+"preferito");
          barra.classList="barra";
          barra.appendChild(like);
          barra.appendChild(textBox);
          barra.append(send);
          
          contenitoreOUT.classList="contenitoreOUT";
          Titolo.innerHTML=arrayInterno.Titolo;
          Descrizione.innerHTML=arrayInterno.Descrizione;
          divisore.classList="Divisore";
          img.id=arrayInterno.id;
          textBox.id=arrayInterno.id+"commento";
          send.id=arrayInterno.id;
          like.id=arrayInterno.id;
          
          cuore.id=arrayInterno.id;
          img.classList="post";
          img.src = imageUrl;
          commenti.id=arrayInterno.id+"div";
          
          DXcontenitoreIN.appendChild(commenti);
          DXcontenitoreIN.appendChild(barra);
          DXcontenitoreIN.appendChild(cuore);

          SXcontenitoreIN.appendChild(Titolo);
          SXcontenitoreIN.appendChild(Descrizione);
          SXcontenitoreIN.appendChild(img);
          
          contenitoreOUT.appendChild(SXcontenitoreIN);
          contenitoreOUT.appendChild(DXcontenitoreIN);
          
          homepage.appendChild(contenitoreOUT);
          homepage.appendChild(divisore);
          aggiornaCommenti(arrayInterno.id);
          AggiornaLike(arrayInterno.id);
          AggiornaPreferiti(arrayInterno.id);

          }
    })
    .catch(error => {
      console.error('Errore nella richiesta:', error);
    });
}


