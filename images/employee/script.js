const box = document.querySelector(".box");

function showElement(i){
    document.getElementById('element'+i).style.display = "block";
    document.getElementById('btnShow'+i).style.display = "none";
    document.getElementById('btnHide'+i).style.display = "block";

}

function hideElement(i){
    document.getElementById('element'+i).style.display = "none";
    document.getElementById('btnShow'+i).style.display = "block";
    document.getElementById('btnHide'+i).style.display = "none";
}

function showHours(dates, code, from, to){
    document.getElementById('overlay').style.display = "block";
    document.getElementById('hours').style.display = "block";

    document.getElementById('hoursDates').innerHTML = dates;

    var hoursURL = "hours.php?code=" + code + "&from=" + from + "&to=" + to;
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





