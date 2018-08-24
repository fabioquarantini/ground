# Ground Wordpress theme
A flexible and powerful WordPress starter theme using a modern development workflow.

## Features
* Compile Sass files to CSS
* Live reloading. Auto reload page when change code across many browsers and devices (Sass, JavaScript, PHP, HTML)
* Inject CSS instead of browser page reload
* Advanced Sass framework
* Concatenates, minify and compress JavaScript files
* Add vendor prefixes to CSS rules using values from Can I Use
* Generate JavaScript and CSS sourcemaps
* Code linting through ESLint
* Extend WordPress css classes to use BEM naming convention
* Icons font generation from svg files
* Notifications feedback on task complete
* Apache Server Configs
* Advanced wp-config.php base kit
* Vertical Rhythm
* Multilingual ready

## Requirements
Make sure you have the latest versions of these software.

* [WordPress](https://wordpress.org)
* [Node.js](https://nodejs.org) - check with `node -v`
* [Yarn](https://yarnpkg.com) - check with `yarn -v` (you can also use npm)

## Installation
* Download the repository and install it as a theme in your Wordpress installation `wp-content/themes/`
* Rename the theme folder with the name chosen by you
* With your terminal go to your renamed theme folder and run `yarn` (or `npm install`)

## Workflow
Open the Ground folder using the terminal and type one of the following commands

* `yarn start` — Concatenates, compile, minify and compress assets when changes are made
* `yarn server` — Concatenates, compile, minify and compress assets when changes are made, start Browsersync
* `yarn prettify` — Concatenates, compile assets when changes are made

## Sass structure
* **Animations** - Library of CSS animations
* **Base** - Bare HTML elements (html, h1, a, p, etc…)
* **Components** - Specific UI components that are reusable. Each component should be isolated
* **Debug** - Tools to debug CSS
* **Functions** - Blocks of code that return a single value of any Sass data type
* **Layouts** - Macro layout styles ( container, grid ...)
* **Mixins** - Groups of CSS declarations that you want to reuse throughout your site
* **Utilities** - Single use classes to perform a single function or change a single attribute (.display-none, .clear-fix ...)
* **Vendors** - Third party libraries
* **_settings.scss** - Variables, colors, grid setup, config switches ecc...
* **main.scss** - Import all other files

## Credits
[Fabio Quarantini](http://www.fabioquarantini.com)

## License
[MIT License](https://opensource.org/licenses/MIT)
