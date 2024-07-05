import { InspectorControls } from "@wordpress/block-editor";
import {
	Button,
	PanelBody,
	PanelRow,
	RangeControl,
} from "@wordpress/components";

export default function Inspector({ attributes, setAttributes }) {
	const {
		columnSize,
		columnSizeSm,
		columnSizeMd,
		columnSizeLg,
		columnSizeXl,
		columnSizeXxl,
	} = attributes;

	const resetColumnSize = (size) => setAttributes({ [size]: undefined });

	return (
		<InspectorControls>
			<PanelBody title="Column Sizes" initialOpen={true}>
				<PanelRow>
					<RangeControl
						label="Column size (default):"
						value={columnSize}
						onChange={(columnSize) => setAttributes({ columnSize })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetColumnSize("columnSize")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Column size (small devices):"
						value={columnSizeSm}
						onChange={(columnSizeSm) => setAttributes({ columnSizeSm })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetColumnSize("columnSizeSm")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Column size (medium devices):"
						value={columnSizeMd}
						onChange={(columnSizeMd) => setAttributes({ columnSizeMd })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetColumnSize("columnSizeMd")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Column size (large devices):"
						value={columnSizeLg}
						onChange={(columnSizeLg) => setAttributes({ columnSizeLg })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetColumnSize("columnSizeLg")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Column size (extra large devices):"
						value={columnSizeXl}
						onChange={(columnSizeXl) => setAttributes({ columnSizeXl })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetColumnSize("columnSizeXl")}>
						Reset
					</Button>
				</PanelRow>
				<PanelRow>
					<RangeControl
						label="Column size (extra extra large devices):"
						value={columnSizeXxl}
						onChange={(columnSizeXxl) => setAttributes({ columnSizeXxl })}
						min={1}
						max={12}
					/>
					<Button isSecondary onClick={() => resetColumnSize("columnSizeXxl")}>
						Reset
					</Button>
				</PanelRow>
			</PanelBody>
		</InspectorControls>
	);
}
