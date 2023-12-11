"use strict";

function loadScreen(screen) {
    // Using AJAX to fetch content for the selected screen
    var xhr = new XMLHttpRequest();
    var url = "screens/" + screen + ".php";

    
    // Hide all screens
    var screens = document.querySelectorAll('.hidden');
    screens.forEach(function (screenElement) {
        screenElement.style.display = 'none';
    });

    // Show the selected screen if it exists
    var selectedScreen = document.getElementById(screen);
    if (selectedScreen) {
        selectedScreen.style.display = 'block';

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    // Update the content dynamically
                    selectedScreen.innerHTML = xhr.responseText;
                } else {
                    // Handle errors
                    console.error("Failed to fetch " + url + ". Status: " + xhr.status);
                }
            }
        };
        xhr.open("GET", url, true);
        xhr.send();
    } else {
        console.error("Screen element not found: " + screen);
    }
    
}


function loadContactDetails(screen , id) {
    // Using AJAX to fetch content for the selected screen
    var xhr = new XMLHttpRequest();
    var url = "screens/" + screen + ".php?id=" + id;

    
    // Hide all screens
    var screens = document.querySelectorAll('.hidden');
    screens.forEach(function (screenElement) {
        screenElement.style.display = 'none';
    });

    // Show the selected screen if it exists
    var selectedScreen = document.getElementById(screen);
    if (selectedScreen) {
        selectedScreen.style.display = 'block';

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    // Update the content dynamically
                    selectedScreen.innerHTML = xhr.responseText;
                } else {
                    // Handle errors
                    console.error("Failed to fetch " + url + ". Status: " + xhr.status);
                }
            }
        };
        xhr.open("GET", url, true);
        xhr.send();
    } else {
        console.error("Screen element not found: " + screen);
    }

}
    



document.addEventListener('DOMContentLoaded', () => {
    loadScreen('dashboard')
});

function Print(id) {

    console.log(id);


     // Send an asynchronous request to update the contact type
     const contactId = id; // Replace with the actual contact ID
    //  var newType = "Sales";

     console.log(contactId);
    //  console.log(newType);


     

const formData = new URLSearchParams();
console.log(formData);

formData.append('contactId', contactId);
// formData.append('newType', newType);
console.log(formData.toString());


fetch("database/updateContactType.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
    },
    body: formData.toString(),
        })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("SUCCESSFULLY SWITCHED THE TYPE OF CONTACT WITH ID: " + id);
            alert("SUCCESSFULLY SWITCHED THE TYPE OF CONTACT WITH ID: " + id)

        } else {
            console.error("FAILED TO SWITCH THE TYPE OF CONTACT WITH ID: " + id);
            alert("FAILED TO SWITCH THE TYPE OF CONTACT WITH ID: " + id)

        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("ERROR SWITCHING THE TYPE OF CONTACT WITH ID: " + id)

    });


}










function AssignedTo(id , signedInUserId) {

    console.log("assign to id:"+ id);


     // Send an asynchronous request to update the contact type
     const contactId = id; // Replace with the actual contact ID
    //  var newType = "Sales";

     console.log(contactId);
     console.log(signedInUserId);

    //  console.log(newType);


     

const formData = new URLSearchParams();
console.log(formData);

formData.append('contactId', contactId);
formData.append('userId', signedInUserId);


// formData.append('newType', newType);
console.log(formData.toString());


fetch("database/assignToConnect.php", {

    method: "POST",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
    },
    body: formData.toString(),
        })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("Contact assigned to updated successfully");
            alert("SUCCESSFULLY SWITCHED THE TYPE OF CONTACT WITH ID: " + id)

        } else {
            console.error("Error updating contact assigned to");
            alert("FAILED TO SWITCH THE TYPE OF CONTACT WITH ID: " + id)

        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("ERROR SWITCHING THE assigned to OF CONTACT WITH ID: " + id)

    });


}



            


