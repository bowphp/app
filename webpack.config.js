let path = require('path');
let UglifyJsPlugin = require("uglifyjs-webpack-plugin");
let OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
let bowmix = require("./Bowmix");
let fs = require('fs');
let webpack = require('webpack');
let rules = [];
let resolve = {extensions: [".js", ".scss", ".vue", ".less"]};
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
let isProd = () => process.env.NODE_ENV == 'production';

/**
 * Configuration exists
 * 
 * @param  {array} ref
 */
let configExists = (ref) => typeof ref !== undefined && ref.length > 0;

/**
 * Compile entries informations
 * 
 * @param {file} files
 */
let addEntry = (files) => {
  const exts = {
    ".js": ".js",
    ".jsx": ".js",
    ".scss": ".css"
  }

  files.map(file => {
    if (file.length != 2) {
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
    key = path.join(file[1], info['name'] + (exts[info['ext']] || info['base']));

    return entry[key] = filename;
  });
}

if (isProd()) {
  plugins.push(
    new webpack.optimize.UglifyJsPlugin()
  );
}

/**
 * Bind vue rules
 */
if (configExists(bowmix.vue)) {
  const { VueLoaderPlugin } = require('vue-loader');

  rules.push({
    test: /\.vue$/,
    loader: 'vue-loader'
  });
  
  rules.push({
    test: /\.css$/,
    use: [
      'vue-style-loader',
      'css-loader'
    ]
  });

  if (! configExists(bowmix.javascript)) {
    rules.push({
      test: /\.js$/,
      loader: 'babel-loader'
    });
  }

  resolve.alias = {
    'vue$': 'vue/dist/vue.esm.js' // Use the full build
  }

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
    exclude: file => (
      /(node_modules|bower_components)/.test(file) &&
      !/\.vue\.js/.test(file)
    ),
    use: {
      loader: "babel-loader",
      options: {
        presets: [
          'babel-preset-env', 
          'babel-preset-es2015', 
          'babel-preset-react'
        ]
      }
    }
  });

  if (!configExists(bowmix.sass)) {
    rules.push({
      test: /\.css$/,
      use: [
        "style-loader",
        "css-loader"
      ]
    });
  }
}

/**
 * Bind sass rules
 */
if (configExists(bowmix.sass)) {
  rules.push({
    test: /\.scss$/,
    use: [
      'vue-style-loader',
      'style-loader',
      "css-loader",
      {
        loader: "sass-loader",
        options: {
          indentedSyntax: true
        }
      }
    ]
  });
}

/**
 * Map entry information
 */
for (ref in bowmix) {
  if (ref != 'config') {
    addEntry(bowmix[ref]);
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
  optimization: {
    minimizer: [
      new UglifyJsPlugin({
        cache: true,
        parallel: true,
        sourceMap: true // set to true if you want JS source maps
      })
      // new OptimizeCSSAssetsPlugin({})
    ]
  },
  plugins: plugins,
  resolve: resolve
};