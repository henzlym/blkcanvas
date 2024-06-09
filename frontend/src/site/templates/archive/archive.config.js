const config = require(`@root/site.config.json`);
const image_sizes = require(`@root/image-sizes.config.js`);

module.exports = {
	label: 'Archive',
	status: 'prototype',
	context: {
		page: {
			title: 'Blog'
		},
		articles_list: {
			classes: 'row-gap-5',
			title: ''
		}
	},
	variants: [
		{
			name: 'grid',
			context: {
				page: {
					title: 'Blog'
				},
				articles_list: {
					title: '',
					row_classes: 'row-cols-md-2 row-gap-3',
					component_name: 'component-card--image'
				}
			}
		}
	]
};
