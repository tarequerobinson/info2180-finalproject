// To code  function for writing to table and for getting username and for writing the code for the buttons to swap depending 
var textarea = document.getElementById("comment");

function getUserbyID(id){
    console.log('poopie')
    var xhr = new XMLHttpRequest();
    url = `database/notesConnect.php?id=${id}`;


    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("assignedTo").innerHTML = `Assigned to: ` + xhr.responseText;
        } else {
            console.log('poopie')
        }
    };


    xhr.send();
}   

function geNotesUserbyID(id){
    console.log('poopie')
    var xhr = new XMLHttpRequest();
    url = `database/notesConnect.php?id=${id}`;


    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        

        document.getElementById("CommentHeader").innerHTML = "<h1>" + xhr.responseText + "</h1>";
    } else {
        console.log('poopie')
    }
};

}

