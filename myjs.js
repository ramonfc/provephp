/* document.getElementById("myBtn").addEventListener("click", function(event) {
    event.preventDefault()
    getQuery();
}); */

function getQuery() {
    event.preventDefault();
    let name = document.getElementById("nombre").value;
    name = name.trim();
    let age = document.getElementById("edad").value;
    age = age.trim();

    var query = "?nombre=" + name + "&edad=" + age;
    //http://localhost/ensayoPHP/formSimple/accion.php?nombre=Jenny&edad=23

    var url = "http://localhost/ensayoPHP/formSimple/accion.php" + query;
    //var url = "accion.php" + query;
    getRequest2(url);
}

function getRequest(url) {

    var httpRequest = new XMLHttpRequest();
    if (!httpRequest) {
        alert("Http Request error!");
        return false;
    } else {


        httpRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let data = this.responseText;

                document.getElementById("display").innerHTML = data;
            }
        };
        httpRequest.open("GET", url, true);
        httpRequest.send();
    }
}


const getRequest2 = async(url) => {
    try {
        const resp = await fetch(url)
        const data = await resp.json()
        console.log(data.length)
            //document.getElementById('display').innerHTML = data.name;
        var output = "<table><tr><th>Name</th><th>Age</th></tr>"
        for (var i = 0; i < data.length; i++) {
            output += "<tr><td>" + data[i].name + "</td><td>" + data[i].age + "</td>"
        }


        output += "</table";
        document.getElementById('display').innerHTML = output;
    } catch (e) {
        console.log(e)
    }
}