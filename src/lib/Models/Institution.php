<?php
/*
 * Institution
 */
namespace SwaggerServer\lib\Models;

/*
 * Institution
 */
class Institution {
    /* @var string $uri Unique identifier representing a specific BISE college or university. */
    private $uri;
    /* @var \SwaggerServer\lib\Models\Label[] $label Labels of the specific institution. */
    private $label;
    /* @var \SwaggerServer\lib\Models\Label[] $altLabel Alternative labels of the specific institution. */
    private $altLabel;
    /* @var \SwaggerServer\lib\Models\Location $location Location of institution. */
    private $location;
    
}
