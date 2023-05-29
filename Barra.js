//  menuIcon=document.getElementById("menuIcon"); ----Se lo lascio mi da errore booo
menuIcon.onclick=function(){
    menuBox.classList.toggle("open-menu");
    if(menuBox.classList.contains("open-menu")){
        menuIcon.src="img/close.png";
    }else{
        menuIcon.src="img/menu.png";
    }
}