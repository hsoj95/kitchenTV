// v3.1.0
//Docs at http://simpleweatherjs.com

$(document).ready(function() {
  loadWeather(); //Get the initial weather.
  setInterval(loadWeather, 600000); //Update the weather every 10 minutes.
});



function loadWeather(){

 $.simpleWeather({
    location: '90210',
    woeid: '',
    unit: 'f',
    success: function(weather) {
	city = weather.city;
	temp = weather.temp+'&deg;F';
	wcode = '<img class="weathericon" src="images/weathericons/' + weather.code + '.svg">';
	wind = weather.wind.speed + ' ' + weather.units.speed;
	humidity = weather.humidity + ' %';
	updated = weather.updated;
	f1i = weather.forecast[1].code;
	f2i = weather.forecast[2].code;
	f3i = weather.forecast[3].code;
	f4i = weather.forecast[4].code;
	f5i = weather.forecast[5].code;
	f1d = weather.forecast[1].day;
	f2d = weather.forecast[2].day;
	f3d = weather.forecast[3].day;
	f4d = weather.forecast[4].day;
	f5d = weather.forecast[5].day;

	$(".location").text(city);
	$(".temperature").html(temp);
	$(".climate_bg").html(wcode);
	$(".windspeed").html(wind);
	$(".humidity").text(humidity);
	$(".updated").text(updated);
	$(".forecast").html('<span><img src="images/weathericons/' + f1i + '.svg" /><br />' + f1d + '</span><span><img src="images/weathericons/' + f2i + '.svg" /><br />' + f2d + '</span><span><img src="images/weathericons/' + f3i + '.svg" /><br />' + f3d + '</span><span><img src="images/weathericons/' + f4i + '.svg" /><br />' + f4d + '</span><span><img src="images/weathericons/' + f5i + '.svg" /><br />' + f5d + '</span>');
    },
    error: function(error) {
      $(".error").html('<p>'+error+'</p>');
    }
  });
}
