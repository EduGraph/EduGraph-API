<?php
/*
 * Label
 */
namespace EduGraph\lib\Models;

use JsonSerializable;

/*
 * Label
 */
class Label implements JsonSerializable{
    /* @var string $languageCode ISO 639-1 Language Code. */
    private $languageCode;
    /* @var string $value Label of object. */
    private $value;

    /**
     * Label constructor.
     * @param string $languageCode
     * @param string $value
     */
    public function __construct($languageCode, $value)
    {
        $this->languageCode = $languageCode;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param string $languageCode
     */
    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
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
            'lang' => $this->getLanguageCode(),
            'value' => $this->getValue()
        ];
    }

    /**
     * @return string
     */
    public function __toString(){
        return json_encode($this);
    }

}
