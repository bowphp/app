module.exports = {
	config: {
		prefix: __dirname,
		version: false,
		versionFilename: __dirname + '/.mixfile-version.json'
	},

  /**
   * React, vue and Vanilla Javascript compile files
   */
  javascript: [
    ["components/js/app.js", "public/js"]
  ],

	/**
	 * Sass compile files
	 */
	sass: [
	 	["components/sass/app.scss", "public/css"]
	]
};
