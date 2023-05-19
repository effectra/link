<?php

namespace Effectra\Link;

use Psr\Link\EvolvableLinkInterface;
use Psr\Link\LinkInterface;
use Psr\Link\LinkProviderInterface;

/**
 * LinkProvider is responsible for providing links and evolvable links.
 *
 * This class implements the Psr\Link\LinkProviderInterface
 * interface and provides methods to retrieve links and evolvable links.
 */
class LinkProvider implements LinkProviderInterface
{
    public function __construct(protected iterable $links, protected iterable $evolvableLinks)
    {
    }
    /**
     * Returns an array of links.
     *
     * @return LinkInterface[] An array of LinkInterface objects
     */
    public function getLinks(): iterable
    {
        // Create an array of LinkInterface objects
        // $links = [];

        // Add links to the array using the Link class or any other class that implements LinkInterface

        // $links[] = new Link(href: 'http://example.com/posts',rels: ['rel' => 'collection']);

        return $this->links;
    }

    /**
     * Returns an array of evolvable links.
     *
     * @return EvolvableLinkInterface[] An array of EvolvableLinkInterface objects
     */
    public function getLinksByRel(string $rel): iterable
    {
        // Create an array of EvolvableLinkInterface objects
        // $evolvableLinks = [];

        // Add evolvable links to the array using the EvolvableLink class or any other class that implements EvolvableLinkInterface


        return $this->evolvableLinks;
    }
    /**
     * Returns an HTML string with links.
     *
     * @param LinkInterface[] $links An array of LinkInterface objects
     * @return string The HTML string with links
     */
    public function withHTML(array $links): string
    {
        $html = '';
        foreach ($links as $link) {
            $html .= sprintf('<a href="%s">%s</a>', $link->getHref(), $link->getAttributes()['rel']);
        }
        return $html;
    }
}
