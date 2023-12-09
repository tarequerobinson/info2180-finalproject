// To code  function for writing to table and for getting username and for writing the code for the buttons to swap depending 
var textarea = document.getElementById("comment");

function getUserbyID(id){
    console.log('is it running Users')
    var xhr = new XMLHttpRequest();
    url = `database/notesConnect.php?id=${id}`;


    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        document.getElementById("assignedTo").innerHTML = `Assigned to: ` + xhr.responseText;
    } else {
    }
};


    xhr.send();
}   

function geNotesUserbyID(id){
    console.log('is it running Notes')
    var xhr = new XMLHttpRequest();
    url = `database/notesConnect.php?id=${id}`;


    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        

        document.getElementById("CommentHeader").innerHTML = "<h3>" + xhr.responseText + "</h3>";
    } else {
        
    }
};

}

