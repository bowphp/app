module.exports = {
	config: {
		prefix: __dirname,
		version: false
	},

	/**
	 * Javascript compile files
	 */
	javascript: [
		[]
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