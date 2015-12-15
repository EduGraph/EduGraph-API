<?php
/*
 * Institution
 */
namespace EduGraph\lib\Models;

use EduGraph\lib\Models\Label;
use EduGraph\lib\Models\Location;
use EduGraph\lib\Models\Program;
use JsonSerializable;

/*
 * Institution
 */
class Institution implements JsonSerializable {
    /* @var string $uri Unique identifier representing a specific BISE college or university. */
    private $uri;
    /* @var string $url Resource URL. */
    private $url;
    /* @var Label[] $labels Labels of the specific institution. */
    private $labels;
    /* @var Label[] $altLabels Alternative labels of the specific institution. */
    private $altLabels;
    /* @var Location $location Location of institution. */
    private $location;

    /**
     * Institution constructor.
     * @param string $uri
     * @param Label[] $labels
     * @param Label[] $altLabels
     * @param Location $location
     */
    public function __construct($uri, $url, array $labels, array $altLabels, Location $location)
    {
        $this->uri = $uri;
        $this->url = $url;
        $this->labels = $labels;
        $this->altLabels = $altLabels;
        $this->location = $location;
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
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * @return Institution
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
     * @return Label[]
     */
    public function getAltLabels()
    {
        return $this->altLabels;
    }

    /**
     * @param Label[] $altLabels
     */
    public function setAltLabels($altLabels)
    {
        $this->altLabels = $altLabels;
    }

    /**
     * @param Label $altLabel
     * @return Institution
     */
    public function addAltLabel($altLabel)
    {
        foreach($this->getAltLabels() as $key => $value){
            if($altLabel->getLanguageCode() == $value->getLanguageCode() && $altLabel->getValue() == $value->getValue()){
                return false;
            }
        }
        $this->altLabels[] = $altLabel;
        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
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
            'url' => $this->getUrl(),
            'labels' => $this->getLabels(),
            'altLabels' => $this->getAltLabels(),
            'location' => $this->getLocation()
        ];
    }

    /**
     * @return string
     */
    public function __toString(){
        return json_encode($this);
    }

}
