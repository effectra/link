<?php

namespace Effectra\Link;

use Psr\Link\EvolvableLinkInterface;
use Psr\Link\LinkInterface;

/**
 * EvolvableLink represents a link that can evolve over time.
 *
 * This class implements the Psr\Link\LinkInterface and Psr\Link\EvolvableLinkInterface
 * interfaces, providing methods to manage the link's attributes and relations.
 */
class EvolvableLink implements LinkInterface, EvolvableLinkInterface
{
    private $href;
    private $isTemplated;
    private $rels = [];
    private $attributes = [];
    /**
     * Constructs a new EvolvableLink instance.
     *
     * @param string $href The link's URL
     * @param bool $isTemplated Whether the link is templated (optional, default: false)
     * @param array $rels The link's relations (optional, default: [])
     * @param array $attributes The link's attributes (optional, default: [])
     */
    public function __construct($href, $isTemplated = false, array $rels = [], array $attributes = [])
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
    /**
     * Returns a new instance with the updated href.
     *
     * @param string|\Stringable $href The updated href value
     * @return static The new EvolvableLink instance
     */
    public function withHref(string|\Stringable $href): static
    {
        $new = clone $this;
        $new->href = $href;
        return $new;
    }
    /**
     * Returns a new instance with the added relation.
     *
     * @param string $rel The relation to add
     * @return static The new EvolvableLink instance
     */
    public function withRel($rel): static
    {
        $new = clone $this;
        if (!in_array($rel, $new->rels)) {
            $new->rels[] = $rel;
        }
        return $new;
    }
    /**
     * Returns a new instance without the specified relation.
     *
     * @param string $rel The relation to remove
     * @return static The new EvolvableLink instance
     */
    public function withoutRel($rel): static
    {
        $new = clone $this;
        if (($key = array_search($rel, $new->rels)) !== false) {
            unset($new->rels[$key]);
        }
        return $new;
    }
    /**
     * Returns a new instance with the added attribute.
     *
     * @param string $attribute The attribute name
     * @param string|\Stringable|int|float|bool|array $value The attribute value
     * @return static The new EvolvableLink instance
     */
    public function withAttribute(string $attribute, string|\Stringable|int|float|bool|array $value): static
    {
        $attributes = $this->attributes;
        $attributes[$attribute] = $value;

        return new self($this->href, $this->rels, $attributes);
    }
    /**
     * Returns a new instance without the specified attribute.
     *
     * @param string $attribute The attribute to remove
     * @return static The new EvolvableLink instance
     */
    public function withoutAttribute($attribute): static
    {
        $new = clone $this;
        unset($new->attributes[$attribute]);
        return $new;
    }
}
