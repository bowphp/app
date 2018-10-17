module.exports = {
	config: {
		prefix: __dirname,
		version: false
	},

	/**
	 * React and Vanilla Javascript compile files
	 */
	javascript: [
	  // ["components/js/app.js", "public/js"]
	],

	/**
	 * Vuejs compile files
	 */
	vue: [
		["components/js/app.js", "public/js"]
	],

	/**
	 * Sass compile files
	 */
	sass: [
		["components/sass/app.scss", "public/css"]
	],
};
