<?php
namespace GiveToken;

class City
{
    public $id;
    public $name;
    public $population;
    public $longitude;
    public $latitude;
    public $county;
    public $country;
    public $timezone;
    public $temp_hi_spring;
    public $temp_lo_spring;
    public $temp_avg_spring;
    public $temp_hi_summer;
    public $temp_lo_summer;
    public $temp_avg_summer;
    public $temp_hi_fall;
    public $temp_lo_fall;
    public $temp_avg_fall;
    public $temp_hi_winter;
    public $temp_lo_winter;
    public $temp_avg_winter;
    public $created;

    /**
     * Constructs the class
     *
     * @param int $id - the id of the city to pull from the database
     */
    public function __construct($id = null)
    {
        if ($id !== null && strlen($id) > 0) {
            $user = execute_query(
                "SELECT * from city
                WHERE id = '$id'"
            )->fetch_object("GiveToken\City");
            foreach (get_object_vars($user) as $key => $value) {
                $this->$key = $value;
            }
        }
    }
}
