module.exports = async () => {
	// const posts = require(`@root/wp-posts.config.js`);
	const posts = require(`@root/wp-posts-static.config.js`);
	return {
		label: 'Article',
		status: 'prototype',
		context: {
			...posts[3],
			content: 'component-wysiwyg'
		},
		variants: []
	};
};
