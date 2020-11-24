// #region Client Resources
const clientMix = require('laravel-mix');
clientMix.js('resources/js/client/main.js', 'public/js/main.js').version();
clientMix.copyDirectory('resources/client/css', 'public/client/css');
clientMix.copyDirectory('resources/client/js', 'public/client/js');
clientMix.copyDirectory('resources/client/fonts', 'public/client/fonts');
clientMix.copyDirectory('resources/client/ajax', 'public/client/ajax');
clientMix.copyDirectory('resources/client/images', 'public/client/images');
// #endregion