// function getUserbyID(id) {
//     console.log('getUserbyID called with id:', id);
//     var xhr = new XMLHttpRequest();
//     var url = `database/notesConnect.php?id=${id}`;

//     xhr.open("GET", url, true);

//     xhr.onreadystatechange = function () {
//         console.log('onreadystatechange:', xhr.readyState, xhr.status);
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             document.getElementById("assignedTo").innerHTML = `Assigned to: ` + xhr.responseText;
//         }
//     };

//     xhr.send();
// }

// function getNoteUserbyID(id) {
//     console.log('getNoteUserbyID called with id:', id);
//     var xhr = new XMLHttpRequest();
//     var url = `database/notesConnect.php?id=${id}`;

//     xhr.open("GET", url, true);

//     xhr.onreadystatechange = function () {
//         console.log('onreadystatechange:', xhr.readyState, xhr.status);
//         if (xhr.readyState === 4 && xhr.status === 200) {
//             document.getElementById("CommentHeader").innerHTML = "<h3>" + xhr.responseText + "</h3>";
//         }
//     };

//     xhr.send();
// }

// function setDatesforEach(date){
//             const date = new Date(date);
//             const months = [
//                 'January', 'February', 'March', 'April', 'May', 'June',
//                 'July', 'August', 'September', 'October', 'November', 'December'
//             ];

//             const formattedDate = `${months[date.getMonth()]} ${date.getDate()} ${date.getFullYear()} at ${date.getHours()}:${String(date.getMinutes()).padStart(2, '0')}`;
//             document.getElementById('formattedDate').innerText = formattedDate;
// }

document.getElementsByClassName("switch").addEventListener('click', function(){
    var switchbutton = document.getElementByClass("switch")

    if (switchbutton.id == "SupportButton"){
        switchbutton.id = "SalesButton"
        switchbutton.innerHTML= "Switch to Support"

    }else{
        switchbutton.id = "SupportButton";
        switchbutton.innerHTML= "Switch To Sales Lead"
    }
})