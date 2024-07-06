import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";
import "./editor.scss";
import Inspector from "./inspector";

export default function Edit({ attributes, setAttributes }) {
	const { backgroundColor, textColor, tagName, fullWidth } = attributes;

	const TagName = tagName;

	const blockProps = useBlockProps({
		className: clsx({
			container: !fullWidth,
			"container-fluid": fullWidth,
		}),
		style: {
			backgroundColor,
			color: textColor,
		},
	});

	const innerBlocksProps = useInnerBlocksProps(blockProps);

	return (
		<>
			<Inspector {...{ attributes, setAttributes }} />
			<TagName {...innerBlocksProps} />
		</>
	);
}
