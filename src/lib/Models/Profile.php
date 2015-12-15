<?php
/*
 * Profile
 */
namespace EduGraph\lib\Models;

use EduGraph\lib\Models\Label;
use EduGraph\lib\Models\Pillar;

/*
 * Profile
 */
class Profile {
    /* @var \EduGraph\lib\Models\Label[] $label Label of job profile. */
    private $label;
    /* @var float $marketShare Market share of specific job profile. */
    private $marketShare;
    /* @var \EduGraph\lib\Models\Pillar[] $requiredPillar Required pillars. */
    private $requiredPillar;

    /**
     * Profile constructor.
     * @param Label[] $label
     * @param float $marketShare
     * @param Pillar[] $requiredPillar
     */
    public function __construct(array $label, $marketShare, array $requiredPillar)
    {
        $this->label = $label;
        $this->marketShare = $marketShare;
        $this->requiredPillar = $requiredPillar;
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
    public function getMarketShare()
    {
        return $this->marketShare;
    }

    /**
     * @param float $marketShare
     */
    public function setMarketShare($marketShare)
    {
        $this->marketShare = $marketShare;
    }

    /**
     * @return Pillar[]
     */
    public function getRequiredPillar()
    {
        return $this->requiredPillar;
    }

    /**
     * @param Pillar[] $requiredPillar
     */
    public function setRequiredPillar($requiredPillar)
    {
        $this->requiredPillar = $requiredPillar;
    }

}
