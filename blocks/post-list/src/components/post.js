/**
 * External dependencies
 */
import { dateI18n, format, getSettings } from "@wordpress/date";
import clsx from "clsx";

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
		displayPostDate,
		featuredImageSizeHeight,
		featuredImageSizeSlug,
		featuredImageSizeWidth,
	} = attributes;
	const title = post.title.raw;
	const link = post.link;
	const author = post._embedded?.author?.[0];
	let excerpt = post.excerpt.rendered;
	const excerptElement = document.createElement("div");
	excerptElement.innerHTML = excerpt;

	excerpt = excerptElement.textContent || excerptElement.innerText || "";

	const { url: imageSourceUrl, alt: featuredImageAlt } =
		getFeaturedImageDetails(post, featuredImageSizeSlug);
	const { name: primaryCategoryName, link: primaryCategoryLink } =
		getPrimaryCategory(post);
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
	const dateFormat = getSettings().formats.date;
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
					<a href={primaryCategoryLink} rel="category tag">
						{primaryCategoryName}
					</a>
				</nav>
				<h2 className="h3">
					<a href={link} rel="bookmark">
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
							href={author?.link ?? "#"}
							title={`Posts by ${author?.name ?? ""}`}
							rel="author"
						>
							{author?.name ?? ""}
						</a>
					</address>
					{displayPostDate && post.date_gmt && (
						<time
							dateTime={format("c", post.date_gmt)}
							className="date published updated"
						>
							<a href={link}>{dateI18n(dateFormat, post.date_gmt)}</a>
						</time>
					)}
				</section>
				<p>{excerpt}</p>
			</header>
		</article>
	);
};

export default Post;
