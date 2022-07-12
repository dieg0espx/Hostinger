var titleHandlerBar = document.getElementById('titleHandler');

window.addEventListener('scroll', () => {
    // console.log(window.pageYOffset);
    if(window.pageYOffset > 97 ){
      document.getElementById('titleHandler').style.display = "block";
    } 
    if(window.pageYOffset < 43 ){
      document.getElementById('titleHandler').style.display = "none";
    } 
  });