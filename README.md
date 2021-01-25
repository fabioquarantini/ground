# Ground
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
* Notifications feedback on task complete
* Advanced wp-config.php base kit
* Vertical Rhythm
* Multilingual ready

## Requirements
Make sure you have the latest versions of these software.

* [WordPress](https://wordpress.org)
* [Node.js](https://nodejs.org) - check with `node -v`
* [Npm](https://www.npmjs.com/get-npm) - check with `npm -v`
* [GSAP bonus plugins](https://greensock.com/docs/v3/Installation#private)

## Installation
* Download the repository and install it as a theme in your Wordpress installation `wp-content/themes/`
* Rename the theme folder with the name chosen by you
* Install [GSAP bonus plugins](https://greensock.com/docs/v3/Installation#private).
* With your terminal go to your renamed theme folder and run `npm install`

## Workflow
Open the Ground folder using the terminal and type one of the following commands

* `npm start` - Runs the app in development mode. The page will automatically reload if you make changes to the code.

* `npm run build` - Builds the app for production and optimizes the build for the best performance.

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

## Namespaces
* `.js-` - JavaScript hooks: Signify that this piece of the DOM has some behaviour acting upon it, and that JavaScript binds onto it to provide that behaviour.
* `.is-|.has-` - State classes: Signify that the piece of UI in question is currently styled a certain way because of a state or condition.

## Credits
[Fabio Quarantini](http://www.fabioquarantini.com)

## License
[MIT License](https://opensource.org/licenses/MIT)
