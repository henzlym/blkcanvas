import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";

export default function save({ attributes }) {
	const { backgroundColor, textColor, tagName, fullWidth } = attributes;

	const TagName = tagName;

	const blockProps = useBlockProps.save({
		className: clsx({
			container: !fullWidth,
			"container-fluid": fullWidth,
		}),
		style: {
			backgroundColor,
			color: textColor,
		},
	});

	const innerBlocksProps = useInnerBlocksProps.save(blockProps);

	return <TagName {...innerBlocksProps} />;
}
