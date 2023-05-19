# Effectra\Link

Effectra\Link is a PHP library that provides implementations of various PSR link interfaces. It offers classes such as Link, EvolvableLink, and LinkProvider, which enable you to work with hypermedia links, manage evolvable links, and retrieve links for your applications.

## Features

- Create and manipulate hypermedia links
- Manage evolvable links
- Retrieve links by relation
- Generate HTML string with links

## Requirements

- PHP 7.4 or higher

## Installation

You can install the Effectra\Link package via Composer. Simply run the following command:

```bash
composer require effectra/link
```

## Usage

### Creating a Link

```php
use Effectra\Link\Link;

$link = new Link('http://example.com', false, ['rel' => 'self'], ['title' => 'Example Link']);
```

### Manipulating a Link

```php
// Add a relation to the link
$link = $link->withRel('next');

// Remove a relation from the link
$link = $link->withoutRel('self');

// Add an attribute to the link
$link = $link->withAttribute('class', 'link-class');

// Remove an attribute from the link
$link = $link->withoutAttribute('title');
```

### Retrieving Links

```php
use Effectra\Link\LinkProvider;

$link1 = new Link('http://example.com', false, ['rel' => 'self']);
$link2 = new Link('http://example.com/posts', false, ['rel' => 'collection']);

$links = [$link1, $link2];

$linkProvider = new LinkProvider($links, []);

$allLinks = $linkProvider->getLinks(); // Returns an array of LinkInterface objects

$collectionLinks = $linkProvider->getLinksByRel('collection'); // Returns an array of EvolvableLinkInterface objects with the 'collection' relation
```

### Generating HTML with Links

```php
$html = $linkProvider->withHTML($links); // Generates an HTML string with links
```

For more information and advanced usage, please refer to the documentation.

## Contributing

Contributions are welcome! If you have any bug reports, feature requests, or suggestions, please open an issue on the GitHub repository.

## License

Effectra\Link is open-source software licensed under the MIT license. See the [LICENSE](LICENSE) file for more information.
```

Feel free to customize the content to fit your specific needs.
