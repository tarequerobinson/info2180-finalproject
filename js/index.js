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
    alert("Test! Id: " + id)


     // Send an asynchronous request to update the contact type
     const contactId = id; // Replace with the actual contact ID
     var newType ;
     
     /*if (switchButton.innerHTML  == "Switch To Sales Lead" ){
         newType = "Sales Lead";
     }
     else if (switchButton.innerHTML  == "Switch To Support" )  {
         newType = "Support";

     };*/

     // Using Fetch API for simplicity
     fetch("updateContactType.php", {
         method: "POST",
         headers: {
             "Content-Type": "application/x-www-form-urlencoded",
         },
         body: `contactId=${contactId}&newType=${newType}`,
     })
         .then(response => response.json())
         .then(data => {
             if (data.success) {
                 console.log("Contact type updated successfully");
             } else {
                 console.error("Error updating contact type");
             }
         })
         .catch(error => {
             console.error("Error:", error);
         });

}


            


