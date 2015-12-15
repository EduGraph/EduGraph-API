<?php
/*
 * Location
 */
namespace EduGraph\lib\Models;

use EduGraph\lib\Models\Label;
use JsonSerializable;

/*
 * Location
 */
class Location implements JsonSerializable{
    /* @var string $uri */
    private $uri;
    /* @var \EduGraph\lib\Models\Label[] $labels Label of location. */
    private $labels;
    /* @var float $latitude Location latitude. */
    private $latitude;
    /* @var float $longitude Location longitude. */
    private $longitude;

    /**
     * Location constructor.
     * @param Label[] $labels
     * @param float $latitude
     * @param float $longitude
     */
    public function __construct($uri, array $labels, $latitude, $longitude)
    {
        $this->uri = $uri;
        $this->labels = $labels;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return Label[]
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param Label[] $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }

    /**
     * @param Label $label
     * @return Location
     */
    public function addLabel($label)
    {
        foreach($this->getLabels() as $key => $value){
            if($label->getLanguageCode() == $value->getLanguageCode() && $label->getValue() == $value->getValue()){
                return false;
            }
        }
        $this->labels[] = $label;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize(){
        return [
            'uri' => $this->getUri(),
            'labels' => $this->getLabels(),
            'lat' => $this->getLatitude(),
            'lon' => $this->getLongitude()
        ];
    }
}
