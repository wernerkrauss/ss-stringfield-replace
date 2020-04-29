# README

This module provides a simple search/replace functionality for DBString derived fields (Text, HTMLText, Varchar) in Silverstripe CMS 4.

## Requirements
* Silverstripe > 4

## Installation
Install this package using composer

> composer require wernerkrauss/ss-stringfield-replace ^0.1

## Features:
You can define maps to replace in your text field. By default it replaces: 
*  `(c)` becomes  `&copy;`
* `(r)` becomes `<sup>&reg;</sup>`
* `(tm)` becomes `<sup>&trade;</sup>`
* `|` becomes `<br>`

This can be used in templates using the `Replace` method, e.g. 

```
<h1>$Title.Replace</h1>
```

## Configuration
You can add your own replacements by modifying `SilverStripe\ORM\FieldType\DBString.replacements` config

