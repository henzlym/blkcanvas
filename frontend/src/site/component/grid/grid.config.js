const articles = require(`@root/articles.config.js`);
const users = require(`@root/users.config.js`);

module.exports = {
	title: 'Grid',
	status: 'prototype',
	context: {
		component_name: 'component-card--image',
		classes: '',
		row_classes: '3',
		items: articles,
		title: 'Grid Title',
		type: '3'
	},
	variants: []
};
