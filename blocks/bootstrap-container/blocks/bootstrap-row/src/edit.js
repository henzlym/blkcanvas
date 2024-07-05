import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps({
		className: clsx({
			row: true,
		}),
	});
	const innerBlocksProps = useInnerBlocksProps(blockProps);

	return <div {...innerBlocksProps} />;
}
