<?php
/*
 * Pillar
 */
namespace EduGraph\lib\Models;

use EduGraph\lib\Models\Label;
use JsonSerializable;

/*
 * Pillar
 */
class Pillar implements JsonSerializable{
    /* @var \EduGraph\lib\Models\Label[] $label Label of pillar. */
    private $label;

    /**
     * Pillar constructor.
     * @param Label[] $label
     */
    public function __construct(array $label)
    {
        $this->label = $label;
    }

    /**
     * @return Label[]
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param Label[] $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}
