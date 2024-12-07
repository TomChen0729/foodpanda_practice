<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p id="demo">Click the button to get your coordinates:</p>

<button onclick="getLocation()">Try It</button>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "抱歉！瀏覽器不支援Geolocation";
    }
}

function showPosition(position) {
    x.innerHTML="Latitude: " + position.coords.latitude + 
  "<br /> Longitude: " + position.coords.longitude;	
}
</script>
</body>
</html>