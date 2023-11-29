    // Select the element with the id 'contacttype'
    var contactTypeElement = document.getElementsByTagName(tr);
    console.log(contactTypeElement);


    // Get the text content of the element
    var contactTypeText = contactTypeElement.textContent || contactTypeElement.innerText;

    // Define colors based on text content
    var colorMap = {
        'Partner': 'red',      // Change 'Type1' to the actual text content you expect
        'Type2': 'green',    // Change 'Type2' to the actual text content you expect
        'Type3': 'blue'      // Change 'Type3' to the actual text content you expect
        // Add more mappings as needed
    };

    // Set background color based on the text content
    if (colorMap.hasOwnProperty(contactTypeText)) {
        contactTypeElement.style.backgroundColor = colorMap[contactTypeText];
    }
