# Per page Pesource Plugin

The **Per Page Resource** Plugin for the [Grav CMS](http://github.com/getgrav/grav) allows to add additional JavaScript and or CSS to one of your pages if it statisfies some conditions, without editing the theme or having to create a plugin for the simple task of adding some custom lines of JavaScript.

## Description

Adds some custom JavaScript to your Grav site's page.

Open the plugin preferences in the Admin panel, and set the name of the file to check for javascript file (defaults to `perpage.yaml`). You'll save such file in your page folder and add a `perpage.yaml` file containing:
```yaml
js: 
  0: name_of_first_js.js

css:
  0: name_of_first_css.js
```

## Thanks
To Dmitry Yakovlev for his [grav-plugin-custom-js](https://github.com/dimayakovlev/grav-plugin-custom-js) plugin
