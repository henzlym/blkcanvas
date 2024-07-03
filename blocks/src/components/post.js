/**
 * External dependencies
 */
import clsx from "clsx";
import _ from "lodash";

function getFeaturedImageDetails(post, size) {
	const image = post._embedded?.["wp:featuredmedia"]?.["0"];

	return {
		url: image?.media_details?.sizes?.[size]?.source_url ?? image?.source_url,
		alt: image?.alt_text,
	};
}

function getPrimaryCategory(post) {
	const term = post._embedded?.["wp:term"]?.["0"]?.["0"];

	return {
		name: term?.name,
		slug: term?.slug,
	};
}

const Post = ({ post, attributes }) => {
	const {
		addLinkToFeaturedImage,
		displayFeaturedImage,
		featuredImageSizeHeight,
		featuredImageSizeSlug,
		featuredImageSizeWidth,
	} = attributes;
	const title = _.get(post, "title.rendered", "").trim();
	const link = _.get(post, "post.link", "");
	let excerpt = _.get(post, "excerpt.rendered", "");
	const excerptElement = document.createElement("div");
	excerptElement.innerHTML = excerpt;

	excerpt = excerptElement.textContent || excerptElement.innerText || "";

	const { url: imageSourceUrl, alt: featuredImageAlt } =
		getFeaturedImageDetails(post, featuredImageSizeSlug);
	const { name: primaryCategoryName } = getPrimaryCategory(post);
	const imageClasses = clsx({
		"col-sm-5 img-fluid aspect-ratio-widescreen object-fit-cover wp-post-image": true,
	});
	const renderFeaturedImage = displayFeaturedImage && imageSourceUrl;
	const featuredImage = renderFeaturedImage && (
		<img
			className={imageClasses}
			src={imageSourceUrl}
			alt={featuredImageAlt}
			width="720"
			height="405"
			style={{
				maxWidth: featuredImageSizeWidth,
				maxHeight: featuredImageSizeHeight,
			}}
		/>
	);

	return (
		<article className="list-item row align-items-start g-3 post-106 post type-post status-publish format-standard has-post-thumbnail hentry category-themes category-uncategorized tag-themes tag-wordpress">
			{renderFeaturedImage &&
				(addLinkToFeaturedImage ? (
					<a href={"#"} rel="noreferrer noopener">
						{featuredImage}
					</a>
				) : (
					featuredImage
				))}
			<header className={renderFeaturedImage ? "col-sm-7" : ""}>
				<nav className="post-categories text-uppercase mb-3 small">
					<a
						href="https://henzlymeghie.com/category/wordpress/themes/"
						rel="category tag"
					>
						{primaryCategoryName}
					</a>
				</nav>
				<h2 className="h3">
					<a
						href="https://henzlymeghie.com/building-scalable-wordpress-themes-best-practices/"
						rel="bookmark"
					>
						{title}
					</a>
				</h2>
				<section
					className="page-meta small text-body-tertiary d-flex gap-2 mb-3"
					aria-label="Author byline and Published date"
				>
					<address className="author text-capitalize mb-0">
						<span>By </span>
						<a
							href="https://henzlymeghie.com/author/henzlymeghie/"
							title="Posts by henzlymeghie"
							rel="author"
						>
							henzlymeghie
						</a>
					</address>
					<time
						className="date published updated"
						dateTime="2024-06-24T23:54:43+00:00"
					>
						<a href="https://henzlymeghie.com/building-scalable-wordpress-themes-best-practices/">
							June 24, 2024
						</a>
					</time>
				</section>
				<p>{excerpt}</p>
			</header>
		</article>
	);
};

export default Post;
