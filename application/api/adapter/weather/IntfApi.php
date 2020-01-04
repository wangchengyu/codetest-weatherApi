<?php
namespace app\adapter\weather;

/**
 * Interface IntfApi for implementing weather api
 */
interface IntfApi {

    /**
     * get source data from open api
     */
    public function getSourceData();

    /**
     * get city name from the data by api
     */
    public function getCityName();

    /**
     * get updated time
     */
    public function getUpdatedTime();

    /**
     * get temperature
     */
    public function getTemperature();

    /**
     * get weather
     */
    public function getWeather();

    /**
     * get wind speed
     */
    public function getWind();

}
