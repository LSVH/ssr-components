<!-- badges -->

[![Latest Stable Version][badge-stable-version]][packagist]
[![Latest Unstable Version][badge-unstable-version]][packagist]
[![Total Downloads][badge-downloads]][packagist]
![Pipeline Build Status][badge-test-status]

<!-- intro -->
<br />
<h3 align="center">SSR Components</h1>

<p align="center">
Server Side Rendered Components for PHP.
</p>

<p align="center">
    <strong><a href="//github.com/lsvh/ssr-components/wiki">Read the documentation</a></strong>
    ·
    <strong><a href="//github.com/lsvh/ssr-components/issues/new">Submit an issue</a></strong>
    ·
    <strong><a href="#contributing">Start contributing</a></strong>
</p>

## Table of Contents

-   [About](#about)
-   [Getting Started](#getting-started)
    -   [Prerequisites](#prerequisites)
    -   [Installation](#installation)
-   [Examples](#examples)
-   [Contributing](#contributing)
-   [License](#license)
-   [Contact](#contact)

## About

In the land of JavaScript component based development have become a well known methodology to develop a project with. However when it comes to front-end development with PHP, achieving a component based structure is not so easy as it seems. Many of the features which we got in JavaScript to help the component based development process are not available in PHP.

With _SSR Components_ that is about to change! This package will allow PHP developers to use component based development on the front-end with similar features to [React][react] and [Angular][angular]. However this all comes with the benefit of PHP rendering on the server side, hence the abbreviation SSR in the package name.

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.

-   [php][php] (version 7.2 or later)
-   [composer][composer] (version 1.8 or later)

### Installation

1. Make sure your project uses composer
    ```sh
    composer init
    ```
2. Install the package
    ```sh
    composer require lsvh/ssr-components
    ```
3. Ensure you bootstrap your project with the composer autoloader.
    ```php
    require __DIR__ . '/vendor/autoload.php';
    ```

## Examples

Have a look at our examples to get a basic understanding of how it all works:

<details>
<summary>Calculator Demo</summary>

<figure style="height: 500px;"><iframe src="https://phpsandbox.io/e/x/gentle-glitter-8bjl?&layout=EditorPreview&iframeId=81yv9dwbit&theme=dark&defaultPath=/&showExplorer=no" style="display: block" loading="lazy" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" width="100%" height="100%"></iframe></figure>

</details>


## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

Distributed under the MIT License. See `LICENSE` for more information.

## Contact

Luuk van Houdt - [@lsvh_org](//twitter.com/lsvh_org)

<!-- links & images -->

[github]: //github.com/lsvh/ssr-components
[github-docs]: //github.com/lsvh/ssr-components/wiki
[github-new-issue]: //github.com/lsvh/ssr-components/issues/new
[packagist]: //packagist.org/packages/lsvh/ssr-components
[react]: //reactjs.org
[angular]: //angular.io
[php]: //php.net
[composer]: //getcomposer.org
[badge-stable-version]: //poser.pugx.org/lsvh/ssr-components/v
[badge-unstable-version]: /poser.pugx.org/lsvh/ssr-components/v/unstable
[badge-downloads]: //poser.pugx.org/lsvh/ssr-components/downloads
[badge-test-status]: //img.shields.io/github/workflow/status/lsvh/ssr-components/tests
