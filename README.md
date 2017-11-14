# Acronyms Plugin

The **Acronyms** Plugin is for [Grav CMS](http://github.com/getgrav/grav).
Its intended usage is to define a set of [Markdown Extra abbreviations](https://michelf.ca/projects/php-markdown/extra/#abbr) that will appear in every page of the site.

## Installation

<!-- Installing the Acronyms plugin can be done in one of two ways.
The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).
From the root of your Grav install type:

    bin/gpm install acronyms

This will install the Acronyms plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/acronyms`.

### Manual Installation -->

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `acronyms`.

You should now have all the plugin files under

    /your/site/grav/user/plugins/acronyms

> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/acronyms/acronyms.yaml` to `user/config/plugins/acronyms.yaml` and only edit that copy.

To configure the plugin, edit the `acronyms.yaml` file and specify the desired abbreviations under `acronyms`.
Abbreviations are specified as key-value pairs, with the key being the abbreviation (or acronym), and the value being the full name.

```yaml
enabled: true
acronyms:
  HTML: Hyper Text Markup Language
  W3C: World Wide Web Consortium
```

Abbreviations can also be specified per-page, in the frontmatter:

```yaml
acronyms:
  acronyms:
    WWW: World Wide Web
```
