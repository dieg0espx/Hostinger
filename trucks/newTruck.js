function companySelected(name){
    console.log(name);
    // document.getElementById('screen1').style.display = "none";
    // document.getElementById('screen2').style.display = "block";
    window.location.replace("chooseJobsite.php?companyFiltered="+name);
    document.cookie = "company="+name;
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

function goToChooseCompany(){
    window.location.replace("chooseCompany.php");
}
function goToChooseJobsite(){
    window.location.replace("chooseJobsite.php?companyFiltered="+getCookie('company'));
}
function goToPictureSubmission(id){
    console.log(id);
    window.location.replace("pictureSubmission.php?id="+id);
}

function toggleAction(action) {
    console.log("Toggle Action" + action);
    const btnShipping = document.getElementById('btnShipping');
    const btnReturn = document.getElementById('btnReturn');
    if(action == 'shipping'){
        btnShipping.style.color = "white";
        btnShipping.style.backgroundColor = "rgb(142, 142, 147)";
        btnReturn.style.color = "rgb(142, 142, 147)";
        btnReturn.style.backgroundColor = "white";

        document.getElementById('status').value= "Shipping";
    } 
    if(action == 'return') {
        btnReturn.style.color = "white";
        btnReturn.style.backgroundColor = "rgb(142, 142, 147)";
        btnShipping.style.color = "rgb(142, 142, 147)";
        btnShipping.style.backgroundColor = "white";

        document.getElementById('status').value= "Return";
    }
}

function showCalendar(){
    document.getElementById('dateAndTime').style.display = "block";
}
