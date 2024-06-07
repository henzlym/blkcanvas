const config = require(`@root/site.config.json`);
const articles = require(`@root/articles.config.js`);
const image_sizes = require(`@root/image-sizes.config.js`);

module.exports = {
	context: {
		page: {
			theme: 'green',
			classes: 'portfolio--magazine',
			mode: 'light',
			header: {
				classes: 'py-sm-3 py-md-5',
				navbar: {
					classes: 'container-lg',
					site_brand: {
						img: false,
						url: '#',
						title: 'Henzly Meghie'
					},
					navigation: {
						classes: 'ms-auto',
						id: 'site-navigation',
						item_class: '',
						js_class: '',
						link_class: '',
						nav_classes: 'text-uppercase',
						title: ''
					},
					navbar_collapse_classes: 'justify-content-end'
				}
			},
			footer: {
				classes: '',
				navbar: {
					classes: 'container-lg',
					site_brand: {
						classes: 'small',
						img: false,
						url: '#',
						title: 'Henzly Meghie'
					},
					navigation: {
						classes: 'ms-auto',
						id: 'site-navigation',
						item_class: '',
						js_class: '',
						link_class: '',
						nav_classes: '',
						title: ''
					},
					navbar_collapse_classes: 'justify-content-end'
				}
			}
		},
		latest_news: {
			classes: 'rounded-0 border-0',
			item_classes: 'px-0 border-black border-bottom',
			title: 'Latest News',
			page: {
				mode: 'light'
			},
			items: articles.slice(0, 10),
			type: 'articles-headline'
		},
		grid: {
			component_name: 'component-card--image',
			classes: '',
			columns: '3',
			items: articles.slice(0, 6),
			title: 'Grid Title',
			type: '3'
		}
	},
	display: {},
	prefix: 'templates',
	root: true
};
