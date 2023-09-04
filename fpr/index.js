function sendJSON(){
              
    let result = document.querySelector('.result');
    let formno = document.querySelector('#formno');
    let email = document.querySelector('#email');
    var e = document.getElementById("branch");
    var value = e.value;

    // Creating a XHR object
    let xhr = new XMLHttpRequest();
    let url = "https://ws.bions.id/regol/generatePDF";

    // open a connection
    xhr.open("POST", url, true);

    // Set the request header i.e. which type of content you are sending
    xhr.setRequestHeader("apikey", "1Q6V58eHv1xE4xu05UNklTbZWmXvNTnG");
    xhr.setRequestHeader("Content-Type", "application/json");

    // Create a state change callback
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {

            // Print received data from server

            var json = JSON.parse(xhr.responseText);
            console.log(json)
            var pdf = json.pdf;
            console.log(pdf)
            const linkSource = `data:application/pdf;base64,${pdf}`;
            const downloadLink = document.createElement("a");
            const fileName = `${formno.value}.pdf`;
            downloadLink.href = linkSource;
            downloadLink.download = fileName;
            downloadLink.click();

        }
    };

    // Converting JSON data to string
    var data = JSON.stringify({ "regid": "", "formno": formno.value,"email": email.value,"branch": value,"source": "WS" });

    // Sending data with the request
    xhr.send(data);

    
}