function loginIn(){
    document.getElementById('loginScreen').style.display = "none";
}
//showing summatory
function showElement(i){
    document.getElementById('element'+i).style.display = "block";
    document.getElementById('btnShow'+i).style.display = "none";
    document.getElementById('btnHide'+i).style.display = "block";
    document.getElementById('preElement'+i).style.borderBottomLeftRadius = "0px";
    document.getElementById('preElement'+i).style.borderBottomRightRadius = "0px";
}

//hidding summatory
function hideElement(i){
    document.getElementById('element'+i).style.display = "none";
    document.getElementById('btnShow'+i).style.display = "block";
    document.getElementById('btnHide'+i).style.display = "none";
    document.getElementById('preElement'+i).style.borderBottomLeftRadius = "5px";
    document.getElementById('preElement'+i).style.borderBottomRightRadius = "5px";
}

//showing individual hours per date
const box = document.querySelector(".box"); //Overlay 
function showHours(dates, code, from, to, regHours, otHours){
    document.getElementById('overlay').style.display = "block";
    document.getElementById('hours').style.display = "block";
    
    document.getElementById('hoursDates').innerHTML = dates;
    document.getElementById('totHours').innerHTML = "REG: " + regHours + " | OT: " + otHours;

    var hoursURL = "profile/hours.php?code=" + code + "&from=" + from + "&to=" + to;
    var tag = document.createElement("iframe");
    tag.setAttribute('src', hoursURL);
    var element = document.getElementById("hoursTable");
    element.appendChild(tag);

    document.querySelector(".box").addEventListener("click", function(event) {
    if (!event.target.closest(".box")) return
      document.getElementById('hours').style.display = "none";
      document.getElementById('overlay').style.display = "none";
      element.removeChild(tag);
    });
}
function hideHours(){
    document.getElementById('hours').style.display = "none";
    document.getElementById('overlay').style.display = "none";
}



function bottomBar(page){
    const txtScreenTitle = document.getElementById('txtScreenTitle');
    const orderScreen = document.getElementById('orderScreen');
    const truckScreen = document.getElementById('truckScreen');
    const damagesScreen= document.getElementById('damagesScreen');
    const profileScreen = document.getElementById('profileScreen');

    const iconOrder = document.getElementById('iconOrder');
    const iconTruck = document.getElementById('iconTruck');
    const iconDamages = document.getElementById('iconDamages');
    const iconProfile = document.getElementById('iconProfile');

    const selectedColor = "rgb(0,122,255)";


    switch (page) {
        case 1:
            txtScreenTitle.innerHTML = "Orders";
            orderScreen.style.display = "block";
            truckScreen.style.display = "none";
            damagesScreen.style.display = "none";
            profileScreen.style.display = "none";

            iconOrder.style.color = selectedColor;
            iconTruck.style.color = "gray";
            iconDamages.style.color = "gray";
            iconProfile.style.color = "gray";
            break;
        case 2:
            txtScreenTitle.innerHTML = "Trucks";
            orderScreen.style.display = "none";
            truckScreen.style.display = "block";
            damagesScreen.style.display = "none";
            profileScreen.style.display = "none";

            iconOrder.style.color = "gray";
            iconTruck.style.color = selectedColor;
            iconDamages.style.color = "gray";
            iconProfile.style.color = "gray";
            break;
        case 3:
            txtScreenTitle.innerHTML = "Damages";
            orderScreen.style.display = "none";
            truckScreen.style.display = "none";
            damagesScreen.style.display = "block";
            profileScreen.style.display = "none";

            iconOrder.style.color = "gray";
            iconTruck.style.color = "gray";
            iconDamages.style.color = selectedColor;
            iconProfile.style.color = "gray";
            break;
        case 4:
            txtScreenTitle.innerHTML = "Profile";
            orderScreen.style.display = "none";
            truckScreen.style.display = "none";
            damagesScreen.style.display = "none";
            profileScreen.style.display = "block";

            iconOrder.style.color = "gray";
            iconTruck.style.color = "gray";
            iconDamages.style.color = "gray";
            iconProfile.style.color = selectedColor;
            break;
    
        default:
            orderScreen.style.display = "block";
            truckScreen.style.display = "none";
            damagesScreen.style.display = "none";
            profileScreen.style.display = "none";

            iconOrder.style.color = selectedColor;
            iconTruck.style.color = "gray";
            iconDamages.style.color = "gray";
            iconProfile.style.color = "gray";
            break;
    }
}

const box2 = document.querySelector(".box2"); //Overlay 

function showOrder(args) {
    console.log(args);
    const data = args.split('|');
    const id = data[0];
    const company = data[1];
  
    var orderURL = "orders/order.php?id=" + id;
    var tag = document.createElement("iframe");
    tag.setAttribute('src', orderURL);
    var element = document.getElementById("elementsTable");
    element.appendChild(tag);

    document.getElementById('bottomBar').style.display = "none";
    document.getElementById('orderScreen').style.paddingBottom = "0px";
    document.getElementById('orderElements').style.display = "block";
    document.getElementById('overlay2').style.display = "block";

    document.querySelector(".box2").addEventListener("click", function(event) {
        if (!event.target.closest(".box2")) return
          document.getElementById('orderElements').style.display = "none";
          document.getElementById('overlay2').style.display = "none";
          document.getElementById('orderScreen').style.paddingBottom = "200px";
          document.getElementById('bottomBar').style.display = "grid";
          hideTitleBar();
          element.removeChild(tag);
    });
}

function showTitleBar(){
    var titleHandlerBar = document.getElementById('titleHandler');
    titleHandlerBar.style.display = "block";
}
function hideTitleBar(){
    var titleHandlerBar = document.getElementById('titleHandler');
    titleHandlerBar.style.display = "none";
}



function addNewTruck(){
    console.log("Adding new truck");
    document.getElementById('overlay3').style.display = "block";
    document.getElementById('newTruckPopUp').style.display = "block";

    document.querySelector(".box3").addEventListener("click", function(event) {
        if (!event.target.closest(".box3")) return
            document.getElementById('newTruckPopUp').style.display = "none";
            document.getElementById('overlay3').style.display = "none";
            document.getElementById('trucksIframe').removeAttribute('src');
            document.getElementById('trucksIframe').setAttribute('src', 'trucks/chooseCompany.php');
    });
}


function showPictures(id) {
    console.log(id);

    document.getElementById('overlay3').style.display = "block";
    document.getElementById('truckImages-popup').style.display = "block";
    document.getElementById('trucksImagesIframe').setAttribute('src', 'trucks/images.php?id='+id);

    document.querySelector(".box3").addEventListener("click", function(event) {
        if (!event.target.closest(".box3")) return
            document.getElementById('truckImages-popup').style.display = "none";
            document.getElementById('overlay3').style.display = "none";
            document.getElementById('trucksImagesIframe').removeAttribute('src');
            // document.getElementById('trucksImagesIframe').setAttribute('src', 'trucks/images.php');
    });

}

function addNewDamage(){
    console.log("Adding new damage");
    document.getElementById('overlay4').style.display = "block";
    document.getElementById('newDamagePopUp').style.display = "block";

    document.querySelector(".box4").addEventListener("click", function(event) {
        if (!event.target.closest(".box4")) return
            document.getElementById('newDamagePopUp').style.display = "none";
            document.getElementById('overlay4').style.display = "none";
            document.getElementById('damagesIframe').removeAttribute('src');
            document.getElementById('damagesIframe').setAttribute('src', 'damages/chooseCompany.php');
    });
}

function showDamagePictures(id) {
    console.log(id);

    document.getElementById('overlay4').style.display = "block";
    document.getElementById('damageImages-popup').style.display = "block";
    document.getElementById('damageImagesIframe').setAttribute('src', 'damages/images.php?id='+id);

    document.querySelector(".box4").addEventListener("click", function(event) {
        if (!event.target.closest(".box4")) return
            document.getElementById('damageImages-popup').style.display = "none";
            document.getElementById('overlay4').style.display = "none";
            document.getElementById('damageImagesIframe').removeAttribute('src');
            // document.getElementById('trucksImagesIframe').setAttribute('src', 'trucks/images.php');
    });

}



function showWorkedHours(){
    document.getElementById('workedHours').style.display = "block";
    document.getElementById('profileMain').style.display = "none";
}
function hideWorkedHours(){
    document.getElementById('workedHours').style.display = "none";
    document.getElementById('profileMain').style.display = "block";
}

function showPayrolls(){
    document.getElementById('payrolls').style.display = "block";
    document.getElementById('profileMain').style.display = "none";
}
function hidePayrolls(){
    document.getElementById('payrolls').style.display = "none";
    document.getElementById('profileMain').style.display = "block";
}


function showFilteredHours(){
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const iframeFilteredHours = document.getElementById('filteredHours');

    iframeFilteredHours.removeAttribute('src');
    iframeFilteredHours.setAttribute('src', 'profile/hours.php?from='+startDate+'&to='+endDate);
}

function reloadIframe(){
    const startDate = document.getElementById('startDate').value = "";
    const endDate = document.getElementById('endDate').value = "";
    const iframeFilteredHours = document.getElementById('filteredHours');
    iframeFilteredHours.removeAttribute('src');
    iframeFilteredHours.setAttribute('src', 'profile/hours.php');
}

function changePassword(){
    document.getElementById('profileMain').style.display = "none";
    document.getElementById('passwordScreen').style.display = "block";
}
function hidePassword(){
    document.getElementById('profileMain').style.display = "block";
    document.getElementById('passwordScreen').style.display = "none";
}

function checkCurrentPassword(){
    const currentPassowrd = document.getElementById('currentPassword').value;

    if(currentPassowrd == getCookie('currentPassword')) {
        document.getElementById('check-current').style.display = "block";
    } else {
        document.getElementById('check-current').style.display = "none";
    }
}

function checkBothPassword(){
    const currentPassowrd = document.getElementById('currentPassword').value;
    const newPasswordConfirmation = document.getElementById('newPasswordConfirmation');
    const newPassword = document.getElementById('newPassword');

    
    if(newPassword.value == newPasswordConfirmation.value){
        document.getElementById('btn-password').disabled = false;
        document.getElementById('check-new').style.display = "block";
        document.getElementById('check-confirm').style.display = "block";

    } else {
        document.getElementById('check-new').style.display = "none";
        document.getElementById('check-confirm').style.display = "none";
        document.getElementById('btn-password').disabled = true;
    }

}

function getCookie(name) {
    function escape(s) { return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1'); }
    var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
    return match ? match[1] : null;
}


function updatePassword (){
    const iframe = document.getElementById('iframePassword');
    const currentPassowrd = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;

    const currentCode = getCookie('currentCode');
    console.log(currentCode);

    iframe.removeAttribute('src');
    iframe.setAttribute('src', "profile/updatePassword.php?currentPassword="+currentPassowrd+"&newPassword="+newPassword+"&code="+currentCode);

    currentPassowrd.value = "";
    newPassword.value = "";

    hidePassword();
}