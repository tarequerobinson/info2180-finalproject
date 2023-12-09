function getUserbyID(id) {
    console.log('getUserbyID called with id:', id);
    var xhr = new XMLHttpRequest();
    var url = `database/notesConnect.php?id=${id}`;

    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
<<<<<<< HEAD
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("assignedTo").innerHTML = `Assigned to: ` + xhr.responseText;
        } else {
            console.log('poopie')
        }
    };

=======
        console.log('onreadystatechange:', xhr.readyState, xhr.status);
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("assignedTo").innerHTML = `Assigned to: ` + xhr.responseText;
        }
    };
>>>>>>> f23a694f1177b8cb1b21921f45a603ca8a0f7316

    xhr.send();
}

function getNoteUserbyID(id) {
    console.log('getNoteUserbyID called with id:', id);
    var xhr = new XMLHttpRequest();
    var url = `database/notesConnect.php?id=${id}`;

    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
        console.log('onreadystatechange:', xhr.readyState, xhr.status);
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("CommentHeader").innerHTML = "<h3>" + xhr.responseText + "</h3>";
        }
    };

    xhr.send();
}

function setDatesforEach(date){
            const date = new Date(date);
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];

            const formattedDate = `${months[date.getMonth()]} ${date.getDate()} ${date.getFullYear()} at ${date.getHours()}:${String(date.getMinutes()).padStart(2, '0')}`;
            document.getElementById('formattedDate').innerText = formattedDate;
}

document.getElementById("switch").addEventListener('click', function(){
    
})