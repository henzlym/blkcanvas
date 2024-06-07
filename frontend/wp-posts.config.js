const _ = require('lodash');

const url = 'http://wordpress.framework.test/wp-json/wp/v2/posts?_embed=true';
const response = await fetch(url);
const data = await response.json();
const posts = _.reduce(
	data,
	function (result, value, key) {
		result[key] = {
			title: _.get(value, 'title.rendered'),
			description: _.get(value, 'excerpt.rendered', ''),
			author: _.get(value, '_embedded.author.name', null),
			categories: _.get(value, 'wp:term.0.name', '')
		};
		console.log(result);
		return result;
	},
	[]
);

module.exports = posts;
