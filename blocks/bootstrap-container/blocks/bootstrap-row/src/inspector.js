import { InspectorControls } from "@wordpress/block-editor";
import {
	Button,
	PanelBody,
	PanelRow,
	RangeControl,
} from "@wordpress/components";

export default function Inspector({ attributes, setAttributes }) {
	const { rowSize, rowSizeSm, rowSizeMd, rowSizeLg, rowSizeXl, rowSizeXxl } =
		attributes;

	const resetRowSize = (size) => setAttributes({ [size]: undefined });

	return (
		<InspectorControls>
			<PanelBody title="Row Sizes" initialOpen={true}>
				<PanelRow>
					<RangeControl
						label="Row size (default):"
						value={rowSize}
						onChange={(rowSize) => setAttributes({ rowSize })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetRowSize("rowSize")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Row size (small devices):"
						value={rowSizeSm}
						onChange={(rowSizeSm) => setAttributes({ rowSizeSm })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetRowSize("rowSizeSm")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Row size (medium devices):"
						value={rowSizeMd}
						onChange={(rowSizeMd) => setAttributes({ rowSizeMd })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetRowSize("rowSizeMd")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Row size (large devices):"
						value={rowSizeLg}
						onChange={(rowSizeLg) => setAttributes({ rowSizeLg })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetRowSize("rowSizeLg")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Row size (extra large devices):"
						value={rowSizeXl}
						onChange={(rowSizeXl) => setAttributes({ rowSizeXl })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetRowSize("rowSizeXl")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Row size (extra extra large devices):"
						value={rowSizeXxl}
						onChange={(rowSizeXxl) => setAttributes({ rowSizeXxl })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetRowSize("rowSizeXxl")}>
						Reset
					</Button>
				</PanelRow>
			</PanelBody>
		</InspectorControls>
	);
}
