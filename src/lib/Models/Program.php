<?php
/*
 * Program
 */
namespace EduGraph\lib\Models;

use EduGraph\lib\Models\Label;
use EduGraph\lib\Models\Rating;

/*
 * Program
 */
class Program {
    /* @var \EduGraph\lib\Models\Label[] $label Label of specific program. */
    private $label;
    /* @var \EduGraph\lib\Models\Rating[] $rating Rating of specific program. */
    private $rating;
    /* @var int $studyPeriods Amount of study periods for specific program. */
    private $studyPeriods;

    /**
     * Program constructor.
     * @param Label[] $label
     * @param Rating[] $rating
     * @param int $studyPeriods
     */
    public function __construct(array $label, array $rating, $studyPeriods)
    {
        $this->label = $label;
        $this->rating = $rating;
        $this->studyPeriods = $studyPeriods;
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
     * @return Rating[]
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param Rating[] $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return int
     */
    public function getStudyPeriods()
    {
        return $this->studyPeriods;
    }

    /**
     * @param int $studyPeriods
     */
    public function setStudyPeriods($studyPeriods)
    {
        $this->studyPeriods = $studyPeriods;
    }

}
