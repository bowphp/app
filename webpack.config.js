const path = require('path');
const webpack = require('webpack');

let bowMix = require("./Mixfile");
let rules = [];
let entry = {};
let version = {};
let resolve = {
  extensions: [
    ".ts", ".tsx", ".js", ".jsx", ".scss", ".css", ".vue"
  ]
};
let plugins = [
  require('autoprefixer'),
  new webpack.ProgressPlugin()
];

/**
 * Check if env is production
 *
 * @return boolean
 */
let isProd = () => process.env.NODE_ENV === 'production';

// You can change version this like:
// bowMix.config.version = isProd()

/**
 * Configuration exists
 *
 * @param  {array} ref
 */
let configExists = (ref) => typeof ref !== 'undefined' && ref.length > 0;

/**
 * Compile entries informations
 *
 * @param {array} files
 */
let addEntry = (files) => {
  const fs = require('fs');
  const exts = {
    ".js": ".js",
    ".ts": ".js",
    ".jsx": ".js",
    ".tsx": ".js",
    ".scss": ".css"
  };

  files.map(file => {
    if (file.length !== 2) {
      return;
    }

    let info;
    let key;
    let objs = {};
    let filename;
    const resolveFile = path.resolve(
      path.join(bowMix.config.prefix, file[0])
    );

    // Parse file
    info = path.parse(resolveFile);
    filename = file[1].replace(/public\/?/, '') + '/' + info['name']  + (exts[info['ext']] || info['base'])

    // Format de entry filename
    if (bowMix.config['version']) {
      key = path.join(file[1], info['name'] + '.' + Date.now() + (exts[info['ext']] || info['base']));
    } else {
      key = path.join(file[1], info['name'] + (exts[info['ext']] || info['base']));
    }

    entry[key] = resolveFile;
    version[filename] = key.replace(/public\/?/, '');

    if (bowMix.config['version']) {
      fs.writeFileSync(bowMix.config['versionFilename'], JSON.stringify(version));
    }

    return entry[key] = resolveFile;
  });
};

/**
 * Bind vue rules: Get more information for configuration https://vue-loader.vuejs.org/guide/#vue-cli
 * Bind javascript rules: Get more information for configuration https://webpack.js.org/loaders/babel-loader/
 */
if (configExists(bowMix.javascript)) {
  const VueLoaderPlugin = require('vue-loader/lib/plugin');

  rules.push({
    test: /\.vue$/,
    loader: 'vue-loader'
  });

  rules.push({
    test: /\.jsx?$/,
    use: {
      loader: "babel-loader",
      options: {
        presets: [
          'babel-preset-env',
          'babel-preset-react'
        ]
      }
    }
  });

  rules.push({
    test: /\.(css)$/,
    use: [
      'vue-style-loader',
      'css-loader'
    ]
  });

  plugins.push(new VueLoaderPlugin());
  resolve['alias'] = {
    vue$: 'vue/dist/vue.js'
  }
}

/**
 * Bind sass rules: Get more information for configuration https://webpack.js.org/loaders/sass-loader
 */
if (configExists(bowMix.sass)) {
  let loader = [];

  if (configExists(bowMix.vue)) {
    loader.push('vue-style-loader');
  }

  loader = loader.concat(['css-loader', 'sass-loader']);

  rules.push({ // regular css files
    test: /\.(scss|css)$/,
    use: loader
  });
}

/**
 * Map entry information
 */
for (let ref in bowMix) {
  if (ref !== 'config') {
    if (bowMix.hasOwnProperty(ref)) {
      addEntry(bowMix[ref]);
    }
  }
}

/**
 * Export Webpack configuration
 *
 * @type {Object}
 */
module.exports = {
  mode: isProd() ? "production" : "development",
  entry: entry,
  output: {
    filename: "[name]",
    path: bowMix.config['prefix']
  },
  module: { rules },
  plugins: plugins,
  resolve: resolve
};
