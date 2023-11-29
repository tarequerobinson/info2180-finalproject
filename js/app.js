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


        // // Function to handle the login and show app content
        // function login() {
        //     // Assume successful login
        //     // Show app content and hide login page
        //     document.getElementById('loginPage').classList.add('hidden');
        //     document.getElementById('appContent').classList.remove('hidden');
        // }


        //             // Function to load the login page content


        //             function loadLoginPage() {
        //                 var xhr = new XMLHttpRequest();
        //                 xhr.onreadystatechange = function () {
        //                     if (xhr.readyState == 4 && xhr.status == 200) {
        //                         // Inject the login page content into the #loginPage element
        //                         document.getElementById('loginPage').innerHTML = xhr.responseText;
        //                     }
        //                 };
        //                 xhr.open("GET", "screens/login.php", true);
        //                 xhr.send();
        //             }
            
        //             // Call the function to load the login page when the page loads
        //             window.onload = function () {
        //                 loadLoginPage();
        //             };
            


