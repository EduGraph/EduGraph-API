<?php
/*
 * Prefix
 */
namespace EduGraph\lib\Models;

/*
 * Prefix
 */
class Prefix {
    /* @var string $prefix Name of the prefix. */
    private $prefix;
    /* @var string $uri URI of the prefix. */
    private $uri;

    /**
     * Prefix constructor.
     * @param string $prefix
     * @param string $uri
     */
    public function __construct($prefix, $uri)
    {
        $this->prefix = $prefix;
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
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

}
