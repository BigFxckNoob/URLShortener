function copy() {
    // Get the text field
    var copyText = document.getElementById("short-url");

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(copyText.value)
            .then(() => {
            console.log('Text copied to clipboard successfully.');
            })
            .catch((error) => {
            console.error('Failed to copy text to clipboard:', error);
            });
    } else {
        console.warn('Clipboard API not available.');
    }


    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    // Alert the copied text
    alert("Copied the text: " + copyText.value);
}