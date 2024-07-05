import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";

export default function save({ attributes }) {
	const {
		columnSize,
		columnSizeSm,
		columnSizeMd,
		columnSizeLg,
		columnSizeXl,
		columnSizeXxl,
	} = attributes;

	const blockProps = useBlockProps.save({
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

	const innerBlocksProps = useInnerBlocksProps.save(blockProps);

	return <div {...innerBlocksProps} />;
}
