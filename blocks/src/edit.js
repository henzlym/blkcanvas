/**
 * External dependencies
 */
import clsx from "clsx";

/**
 * WordPress dependencies
 */
import { useBlockProps } from "@wordpress/block-editor";
import { store as coreStore } from "@wordpress/core-data";
import { useSelect } from "@wordpress/data";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import Post from "./components/post";
import "./editor.scss";
/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { postsToShow, order, orderBy, categories, selectedAuthor } =
		attributes;
	const {
		imageSizes,
		latestPosts,
		defaultImageWidth,
		defaultImageHeight,
		categoriesList,
		authorList,
	} = useSelect((select) => {
		const { getEntityRecords } = select(coreStore);
		const catIds =
			categories && categories.length > 0
				? categories.map((cat) => cat.id)
				: [];
		const latestPostsQuery = Object.fromEntries(
			Object.entries({
				categories: catIds,
				author: selectedAuthor,
				order,
				orderby: orderBy,
				per_page: postsToShow,
				_embed: "wp:featuredmedia, wp:term",
			}).filter(([, value]) => typeof value !== "undefined"),
		);

		return {
			latestPosts: getEntityRecords("postType", "post", latestPostsQuery),
		};
	}, []);

	const hasPosts = !!latestPosts?.length;

	const blockProps = useBlockProps({
		className: clsx({
			"list-group list-group--article-group row-gap-5 mb-5": true,
		}),
	});

	if (!hasPosts) {
		return <div {...blockProps}>No Posts Found...</div>;
	}

	return (
		<ul {...blockProps}>
			{latestPosts.map((post) => {
				return (
					<li className="list-group-item">
						<Post {...{ post, attributes }} />
					</li>
				);
			})}
		</ul>
	);
}
