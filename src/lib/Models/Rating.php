<?php
/*
 * Rating
 */
namespace EduGraph\lib\Models;

use EduGraph\lib\Models\Label;

/*
 * Rating
 */
class Rating {
    /* @var \EduGraph\lib\Models\Label[] $label Label of the specified rating. */
    private $label;
    /* @var float $value Rating value. */
    private $value;

    /**
     * Rating constructor.
     * @param Label[] $label
     * @param float $value
     */
    public function __construct(array $label, $value)
    {
        $this->label = $label;
        $this->value = $value;
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
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}
