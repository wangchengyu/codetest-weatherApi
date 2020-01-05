# WeatherApi
I build this demo on the framework named ThinkPHP5.

## Where does this api get data from?
I registered a free account at https://openweathermap.org

## How to build this demo?
this repo has all file that needed, it just deploy to EB.

## Where does the api deploy to?

1. get city list 

(http://codetest-weather-api.ap-northeast-1.elasticbeanstalk.com/api/weather/getCitys)

2. get weather 

(http://codetest-weather-api.ap-northeast-1.elasticbeanstalk.com/api/weather/getWeather/cityCode/1)

> cityCode = 1 means get weather of Sydney.

3. the frontend 

(http://codetest.ap-northeast-1.elasticbeanstalk.com/#/weather)

## How to add a new city to the list

modify the config file at : /application/extra/Citys.php add a new city.
then to query the city id at https://openweathermap.org
1. downloads a json file about all city in the world (http://bulk.openweathermap.org/sample/city.list.json.gz)
2. search the city by name and what country it belongs to.
3. get the id , write it into another config file named WeatherApi.php, map the city code and the city id!

## Would this project use another api with out openweathermap.org?

Yes! I make the adapter as a plugin mode, just need to config api info, and write a implementation class. It might have some problems. 
