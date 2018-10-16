let path = require('path');
let bowmix = require("./Bowmix");
let fs = require('fs');
let webpack = require('webpack');
let rules = [];
let resolve = {};
let entry = {};
let md5 = require('md5')
let plugins = [
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
    let info;
    let key;
    const filename = path.resolve(
      path.join(bowmix.config.prefix, file[0])
    );

    info = path.parse(filename);
    key = path.join(file[1], isProd()
      ? info['name'] + '.[chunkhash]' + exts[info['ext']] 
      : info['name'] + (exts[info['ext']] || info['ext']) 
    );

    key = key.replace('[chunkhash]', md5(Date.now() + key));

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
  rules.push({
    test: /\.vue$/,
    loader: 'vue-loader'
  });

  resolve.alias = {
    'vue$': 'vue/dist/vue.esm.js' // Use the full build
  }
}

/**
 * Bind javascript rules
 */
if (configExists(bowmix.javascript)) {
  let test = /\.js$/

  if (configExists(bowmix.react)) {
    test = /.jsx?$/
  }

  rules.push({
    test: test,
    exclude: /(node_modules|bower_components)/,
    use: {
      loader: "babel-loader",
      options: {
        presets: ['babel-preset-env']
      }
    }
  });

  rules.push({
    test: /\.css$/,
    use: [
      {
        loader: "style-loader"
      }, 
      {
        loader: "css-loader"
      }
    ]
  });
}

/**
 * Bind sass rules
 */
if (configExists(bowmix.sass)) {
  rules.push({
    test: /\.scss$/,
    use: [
      "style-loader",
      "css-loader",
      "sass-loader"
    ]
  });
}

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
  entry: entry,
  output: {
    filename: "[name]",
    path: bowmix.config['prefix']
  },
  module: {
    rules: rules
  },
  plugins: plugins,
  resolve: resolve,
  devServer: {
      port: 3001
  }
};