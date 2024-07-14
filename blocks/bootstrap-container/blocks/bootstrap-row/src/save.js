import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";

export default function save({ attributes }) {
	const { rowAlignment } = attributes;
	const blockProps = useBlockProps.save({
		className: clsx({
			row: true,
			[rowAlignment]: rowAlignment ?? "",
		}),
	});

	const innerBlocksProps = useInnerBlocksProps.save(blockProps);

	return <div {...innerBlocksProps} />;
}
