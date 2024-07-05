import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";
import "./editor.scss";
import Inspector from "./inspector";

export default function Edit({ attributes, setAttributes }) {
	const {
		columnSize,
		columnSizeSm,
		columnSizeMd,
		columnSizeLg,
		columnSizeXl,
		columnSizeXxl,
	} = attributes;
	const blockProps = useBlockProps({
		className: clsx({
			col: true,
			[`col-${columnSize}`]: columnSize,
			[`col-sm-${columnSizeSm}`]: columnSizeSm,
			[`col-md-${columnSizeMd}`]: columnSizeMd,
			[`col-lg-${columnSizeLg}`]: columnSizeLg,
			[`col-xl-${columnSizeXl}`]: columnSizeXl,
			[`col-xxl-${columnSizeXxl}`]: columnSizeXxl,
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
