Symfony Quickwins
=================

[![Packagist](https://img.shields.io/packagist/v/sylvaindeloux/symfony-quickwins.svg)](https://packagist.org/packages/sylvaindeloux/symfony-quickwins)
[![Packagist](https://img.shields.io/packagist/dt/sylvaindeloux/symfony-quickwins.svg)](https://packagist.org/packages/sylvaindeloux/symfony-quickwins)
[![Build Status](https://travis-ci.org/sylvaindeloux/symfony-quickwins.svg?branch=master)](https://travis-ci.org/sylvaindeloux/symfony-quickwins)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/sylvaindeloux/symfony-mailjet-transport/blob/master/LICENSE.md)

Here are some useful quickwins for Symfony 3+ packaged as a bundle.

*Tests & documentations are coming.*

Changelog
---------

**0.17**

* Added custom templates for `EasyAdminBundle` If you want to use them, you will need to declare the new Twig namespace:
  ````yaml
  twig:
      paths:
          '%kernel.project_dir%/vendor/sylvaindeloux/symfony-quickwins/templates': QuickwinsBundle
  ````

**0.16**

* Added `PlaceKittenProvider` (requires FakerBundle)

**0.15**

* Added `DoctrineHelper`

**0.14**

* Added `PreExecuteInterface`

**0.13**

* Twig 3 support

**0.12**

* Symfony 5 + PHP 7.4 support

**0.11**

* Added `UrlHelper`

**0.10**

* Added `FileSizeHelper`
* Added String Twig extension

**0.9**

* Added `BaseCommand`

**0.8**

* Added `StringHelper`

**0.7**

* Added `CaseHelper`
* Require now PHP >= 7.1

**0.6**

* Added `JsonHelper`

**0.5**

* Added `RandomHelper`

**0.4**

* Added var Twig extension

**0.3**

* Added TmpFile handler

**0.2**

* Added JSON Twig extension

**0.1**

* Added date/time Twig extension
