//Returns index of the target located in the array
function getIndex(array, target){
    for (i =0; i < array.length; i ++){
        if (array[i] == target){ return i;}
    }
    return -1;
}

var elements = [];
function markDone(element){ 
    if(getIndex(elements, element) == -1 ){
        elements.push(element);
        console.log("Element Added " + element);
        document.getElementById(element).style.background="rgb(76,217,100)";
        document.getElementById(element).style.border="none";
        showOrHideButtonSave();
    } else {
        elements.splice(getIndex(elements, element), 1);
        console.log("Element Removed " + element);
        document.getElementById(element).style.background="white";
        document.getElementById(element).style.border="1px solid gray";
        showOrHideButtonSave();
    }
    console.log(elements);

}

function showOrHideButtonSave(){
    if(elements.length > 0){
        document.getElementById('buttonSave').style.display = "block";
    } else {
        document.getElementById('buttonSave').style.display = "none";
    }
}

var ID = 0;
function passingID(id){
    ID = id;
}

function saveDoneElements(){
    document.getElementById('buttonSave').style.display = "none";
    var StrElements = elements.toString();
    const iframeSave = document.getElementById('iframeDoneElements');
    iframeSave.removeAttribute('src');
    iframeSave.setAttribute('src', 'updateDoneElements.php?id=' + ID + '&elements=' + StrElements);
}


