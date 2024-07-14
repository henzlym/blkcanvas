import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";
import "./editor.scss";
import Inspector from "./inspector";
export default function Edit({ attributes, setAttributes }) {
	const { rowAlignment } = attributes;

	const blockProps = useBlockProps({
		className: clsx({
			row: true,
			[rowAlignment]: rowAlignment ?? "",
		}),
	});
	const innerBlocksProps = useInnerBlocksProps(blockProps);

	return (
		<>
			<Inspector {...{ attributes, setAttributes }} />
			<div {...innerBlocksProps} />
		</>
	);
}
