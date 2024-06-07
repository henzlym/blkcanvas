const articles = require(`@root/articles.config.js`);
const article = articles.slice(0, 1)[0];
const users = require(`@root/users.config.js`);
const user = users.slice(0, 1)[0];

module.exports = {
	context: {
		classes: 'flex-column flex-sm-row',
		image: {
			classes: 'w-thumbnail aspect-ratio-widescreen',
			size: 'large'
		},
		title: article.title,
		categories: article.categories,
		description: article.description,
		meta: article.meta,
		read_more: {
			title: 'Read More'
		}
	},
	variants: []
};
