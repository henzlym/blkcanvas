const _ = require('lodash');

const getPosts = (data) => {
	return _.reduce(
		data,
		function (result, value, key) {
			const terms = _.get(value, '_embedded.wp:term.0', []);
			const categories = terms.map((term) => {
				return _.get(term, 'name', null);
			});
			const source_url = _.get(value, '_embedded.wp:featuredmedia.0.source_url', false);
			const media_caption = _.get(
				value,
				'_embedded.wp:featuredmedia.0.image_meta.caption',
				null
			);
			const media_credit = _.get(
				value,
				'_embedded.wp:featuredmedia.0.image_meta.credit',
				null
			);
			const media_id = _.get(value, '_embedded.wp:featuredmedia.0.id', null);
			const media = source_url
				? {
						caption: media_caption,
						credit: media_credit,
						image: {
							alt: media_caption,
							id: media_id,
							size: 'large',
							sources: null,
							src: source_url
						}
				  }
				: null;
			result[key] = {
				title: _.get(value, 'title.rendered'),
				excerpt: _.get(value, 'excerpt.rendered', ''),
				author: {
					name: _.get(value, '_embedded.author.0.name', null),
					url: _.get(value, '_embedded.author.0.link', null)
				},
				categories: categories,
				date: {
					date: _.get(value, 'date', ''),
					modified: _.get(value, 'modified', '')
				},
				featured_media: media
			};
			// console.log(result);
			return result;
		},
		[]
	);
};

module.exports = {
	getPosts
};
