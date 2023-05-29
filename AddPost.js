    const image=document.getElementById("imageInput").addEventListener("change", function() {
    var previewImage = document.getElementById("previewImage");
    var file = this.files[0];
  
    var reader = new FileReader();
    reader.onload = function(e) {
      previewImage.src = e.target.result;
    };
    reader.readAsDataURL(file);
  });
  


  let menuBox=document.getElementById("menuBox");
  let menuIcon=document.getElementById("menuIcon");
  menuIcon.onclick=function(){
      menuBox.classList.toggle("open-menu");
      if(menuBox.classList.contains("open-menu")){
          menuIcon.src="img/close.png";
      }else{
          menuIcon.src="img/menu.png";
      }
  }