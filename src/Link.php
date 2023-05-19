<?php

namespace Effectra\Http\Link;

use Psr\Link\LinkInterface;

/**
 * Link represents a generic link.
 *
 * This class implements the Psr\Link\LinkInterface
 * interface and provides methods to retrieve information about the link.
 */
class Link implements LinkInterface
{
    private $href;
    private $isTemplated;
    private $rels;
    private $attributes;

    /**
     * Constructs a new Link instance.
     *
     * @param string $href The link's URL
     * @param bool $isTemplated Whether the link is templated (optional, default: false)
     * @param array $rels The link's relations (optional, default: [])
     * @param array $attributes The link's attributes (optional, default: [])
     */
    public function __construct(string $href, bool $isTemplated = false, array $rels = [], array $attributes = [])
    {
        $this->href = $href;
        $this->isTemplated = $isTemplated;
        $this->rels = $rels;
        $this->attributes = $attributes;
    }
    /**
     * Retrieves the link's URL.
     *
     * @return string The link's URL
     */
    public function getHref(): string
    {
        return $this->href;
    }
    /**
     * Checks if the link is templated.
     *
     * @return bool True if the link is templated, false otherwise
     */
    public function isTemplated(): bool
    {
        return $this->isTemplated;
    }
    /**
     * Retrieves the link's relations.
     *
     * @return array The link's relations
     */
    public function getRels(): array
    {
        return $this->rels;
    }
    /**
     * Retrieves the link's attributes.
     *
     * @return array The link's attributes
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
