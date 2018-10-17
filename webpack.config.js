let path = require('path');
let UglifyJsPlugin = require("uglifyjs-webpack-plugin");
let bowmix = require("./Mixfile");
let webpack = require('webpack');
let rules = [];
let resolve = {extensions: [".js", ".scss", ".vue", ".less", ".jsx"]};
let entry = {};
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

/**
 * Configuration exists
 *
 * @param  {array} ref
 */
let configExists = (ref) => typeof ref !== undefined && ref.length > 0;

/**
 * Compile entries informations
 *
 * @param {array} files
 */
let addEntry = (files) => {
  const exts = {
    ".js": ".js",
    ".jsx": ".js",
    ".scss": ".css"
  };

  files.map(file => {
    if (file.length !== 2) {
      return;
    }

    let info;
    let key;
    const filename = path.resolve(
      path.join(bowmix.config.prefix, file[0])
    );

    // Parse file
    info = path.parse(filename);
    
    // Format de entry filename
    key = path.join(file[1], (info['name']  + (isProd() ? '.[chunkhash]' : '')) + (exts[info['ext']] || info['base']));

    if (isProd()) {
      key = key.replace('.[chunkhash]', '');
    }

    return entry[key] = filename;
  });
};

/**
 * Bind vue rules
 */
if (configExists(bowmix.vue)) {
  const { VueLoaderPlugin } = require('vue-loader');

  rules.push({
    test: /\.vue$/,
    loader: 'vue-loader'
  });
  
  if (!configExists(bowmix.sass)) {
    rules.push({
      test: /\.css$/,
      use: [
        'vue-style-loader',
        'css-loader'
      ]
    });
  }

  if (! configExists(bowmix.javascript)) {
    rules.push({
      test: /\.js$/,
      loader: 'babel-loader',
      exclude: /(node_modules|bower_components)/,
      options: {
        presets: ['babel-preset-env']
      }
    });
  }

  resolve.alias = {
    'vue$': 'vue/dist/vue.esm.js' // Use the full build
  };

  plugins.push(new VueLoaderPlugin());
}

/**
 * Bind javascript rules
 */
if (configExists(bowmix.javascript)) {
  /**
   * Push Vanilla and Reactjs rules
   */
  rules.push({
    test: /\.jsx?$/,
    exclude: /(node_modules|bower_components)/,
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

  if (!configExists(bowmix.sass)) {
    rules.push({
      test: /\.(scss|css)$/,
      use: [
        'style-loader',
        'css-loader',
        'sass-loader'
      ]
    });
  }
}

/**
 * Bind sass rules
 */
if (configExists(bowmix.sass)) {
  rules.push({
    test: /\.(scss|css)$/,
    use: [
      'style-loader',
      'css-loader',
      'sass-loader'
    ]
  });
}

/**
 * Map entry information
 */
for (let ref in bowmix) {
  if (ref !== 'config') {
    if (bowmix.hasOwnProperty(ref)) {
      addEntry(bowmix[ref]);
    }
  }
}

/**
 * Export Webpack configuration
 * @type {Object}
 */
module.exports = {
  mode: isProd() ? "production" : "development",
  entry: entry,
  output: {
    filename: "[name]",
    path: bowmix.config['prefix']
  },
  module: {
    rules: rules
  },
  plugins: plugins,
  resolve: resolve
};
