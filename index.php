<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWeatherCard</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
    .container {
        display: flex;
        justify-content: center;    
        padding: 2px 16px;
    }
    h2{
        align-content: center;
    }
    h5{
        font-weight: normal;
        padding-left: 50px;
    }
    .card{
        background-color :whitesmoke;
        box-shadow: 0 4px 8px 0 skyblue;
        align-content: center;
        width: 600px;
    }
    .card:hover {
        box-shadow: 0 8px 16px 0 skyblue;
    }
    .loadweather{
        padding-left: 0px;
    }
    span{
        
    }
    h3{
         padding-left: 50px;
         padding-top: 10px;
    }
    #lat{
         margin-top: 15px;
         margin-bottom: 5px;
         margin-left: 50px;
         margin-right: 50px;
    }
    #lon{
         margin-bottom: 5px;
         margin-left: 50px;
         margin-right: 50px;
    }
    #Load{
        margin-top: 5px;
        height: 35px;
        font-size: 18px;
        margin-left: 240px;
        margin-right: 240px;
        border-radius: 4px;
    }

</style>
<script>
   function load(){
        $(".loadweather").hide(); 
        var url ="https://api.openweathermap.org/data/2.5/weather?lat=9.451772&lon=99.999058&appid=77e37d6292ced3d0a78b5d2045eaf2b5&units=metric";        
            $.getJSON(url)
            .done((data)=>{
              console.log(data)
                $("#location").append(data.name);
                $("#country").append(data.sys.country);
                $("#temp").append(data.main.temp);
                $("#temp_max").append(data.main.temp_max);
                $("#temp_min").append(data.main.temp_min);
                $("#humidity").append(data.main.humidity);
                $("#sun_rise").append(data.sys.sunrise);
                $("#sun_set").append(data.sys.sunset);
                $("#wind_speed").append(data.wind.speed);
                $("#clouds").append(data.clouds.all);
                 })       
           .fail((xhr, status, err)=>{
                    console.log("error")
                });
        }     
   function reload(){ 
        $(".weather").hide();
        $(".loadweather").show();
        var url ="https://api.openweathermap.org";
        var a = $("#lat").val();
        var b = $("#lon").val();
           url = url + "/data/2.5/weather?lat=" + a + "&lon=" + b +"&appid=77e37d6292ced3d0a78b5d2045eaf2b5&units=metric"; 
            $.getJSON(url)
            .done((data)=>{
              console.log(data)
                $("#location2").append(data.name);
                $("#country2").append(data.sys.country);
                $("#temp2").append(data.main.temp);
                $("#temp_max2").append(data.main.temp_max);
                $("#temp_min2").append(data.main.temp_min);
                $("#humidity2").append(data.main.humidity);
                $("#sun_rise2").append(data.sys.sunrise);
                $("#sun_set2").append(data.sys.sunset);
                $("#wind_speed2").append(data.wind.speed);
                $("#clouds2").append(data.clouds.all);
                      })         
        .fail((xhr, status, err)=>{
        console.log("error")
        });
        }

    function clear(){
         $("#location2").empty();
         $("#country2").empty();
         $("#temp2").empty();
         $("#temp_max2").empty();
         $("#temp_min2").empty();
         $("#humidity22").empty();
         $("#sun_rise2").empty();
         $("#sun_set2").empty();
         $("#wind_speed2").empty();
         $("#clouds2").empty();
    }
    $(()=>{ 
            load();
            $("#Load").click(()=>{ 
                reload();
            });
            $("#Load").click(()=>{
                clear();
            }); 
     });
   </script> 
<header class="container">
    <h2>MyWeatherCard</h2>
</header>
<body>
    <div class="container">  
        <div class="card">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d983.913775095294!2d99.99850842917576!3d9.451611099576773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOcKwMjcnMDUuOCJOIDk5wrA1OSc1Ni42IkU!5e0!3m2!1sth!2sth!4v1611130108833!5m2!1sth!2sth" width="600" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <input type="text" id="lat" placeholder="Latitude" value="9.451772">
            <input type="text" id="lon" placeholder="Longitude" value="99.999058">
            <button id="Load" class="btn-lm btn-primary" >Load</button>
            <h3>Weather</h3>
            <div class="weather">
                <h5><span id="location">Location Name : </span></h5>
                <h5><span id="country">Country : </span></h5>
                <h5><span id="temp">Temp : </span> c ํ</h5>
                <h5><span id="temp_max">Temp Max : </span> c ํ</h5>
                <h5><span id="temp_min">Temp Min : </span> c ํ</h5>
                <h5><span id="humidity">Humidity : </span> %</h5>
                <h5><span id="sun_rise">Sunrise : </span> Unix</h5>
                <h5><span id="sun_set">Sunset : </span> Unix</h5>
                <h5><span id="wind_speed">Wind Speed : </span> M/s</h5>
                <h5><span id="clouds">Cloud: </span> %</h5>
            </div>
            <div class="loadweather">
                <h5>Location Name : <span id="location2"></span></h5>
                <h5>Country : <span id="country2"></span></h5>
                <h5>Temp : <span id="temp2"></span> c ํ</h5>
                <h5>Temp Max : <span id="temp_max2"></span> c ํ</h5>
                <h5>Temp Min : <span id="temp_min2"></span> c ํ</h5>
                <h5>Humidity : <span id="humidity2"></span> %</h5>
                <h5>Sunrise : <span id="sun_rise2"></span> Unix</h5>
                <h5>Sunset : <span id="sun_set2"></span> Unix</h5>
                <h5>Wind Speed : <span id="wind_speed2"></span> M/s</h5>
                <h5>Cloud : <span id="clouds2"></span> %</h5>
            </div>
        </div>
</body>
</html>