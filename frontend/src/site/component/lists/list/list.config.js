const articles = require(`@root/articles.config.js`);

module.exports = {
	context: {
		classes: 'px-0',
		item_classes: '',
		title: 'Latest News',
		items: articles.slice(0, 10),
		type: 'list',
		read_more: {
			title: 'View Project'
		}
	},
	variants: []
};
