
function InvioDati(event) {
    event.preventDefault();
    const formData = new FormData(FormRicerca);
    fetch("InfoAereo.php", {
        method: 'POST',
        body: formData
      }).then(response => {
        // if (!response.ok) {
        //   throw new Error('Errore nella chiamata al server.');
        // }
        return response.json();
      })
      .then(data => {
        
        var nome=document.getElementById("nome");
        var modello=document.getElementById("modello");
    
       var schema=document.getElementById("homepage");

        var ContenitoreOUT=document.createElement("div");
        var ContenitoreINSX=document.createElement("div");
        
        var ContenitoreINDX=document.createElement("div");
        var textAli=document.createElement("div");
        var textMotore=document.createElement("div");
        var textAltezza=document.createElement("div");
        var textLunghezza=document.createElement("div");
        var img=document.createElement("img");
        var Titolo=document.createElement("h3");
        var divisore=document.createElement("div");
        
        img.classList.add("post");
        img.src="img/schemaaereo.jpeg";
        
        ContenitoreOUT.classList.add("contenitoreOUT");
        ContenitoreINSX.classList.add("contenitoreIN");
        ContenitoreINDX.classList.add("contenitoreIN");
        ContenitoreINSX.appendChild(img);
        divisore.classList="Divisore";

        Titolo.innerHTML=data[0].manufacturer+" "+data[0].model;
        if(data[0].manufacturer!==nome.value||data[0].model!==modello.value){
          var errore=document.createElement("h2");
          errore.style.color="red";
          errore.innerHTML="Forse Cercavi";
          ContenitoreINSX.appendChild(errore);
        }
        ContenitoreINSX.appendChild(Titolo);
        textAli.innerHTML="Apertura alare: "+data[0].wing_span_ft+"ft";
        textMotore.innerHTML="Tipo di motore: "+data[0].engine_type;
        textAltezza.innerHTML="Altezza: "+data[0].height_ft;
        textLunghezza.innerHTML="Lunghezza: "+data[0].length_ft;
        schema.appendChild(divisore);
        ContenitoreINDX.appendChild(textAli);
        ContenitoreINDX.appendChild(textMotore);
        ContenitoreINDX.appendChild(textAltezza);
        ContenitoreINDX.appendChild(textLunghezza);
        ContenitoreOUT.appendChild(ContenitoreINSX);
        ContenitoreOUT.appendChild(ContenitoreINDX);
        schema.appendChild(ContenitoreOUT);
    
      })
      .catch(error => {
     console.error(error);
      });
    
}
const FormRicerca=document.getElementById("Ricerca");
FormRicerca.addEventListener("submit",InvioDati);
