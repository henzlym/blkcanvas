import { InspectorControls } from "@wordpress/block-editor";
import {
	PanelBody,
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
} from "@wordpress/components";

function ToggleGroupJustifyContent({ value, callback }) {
	const options = [
		{ value: "justify-content-start", label: "Left" },
		{ value: "justify-content-center", label: "Center" },
		{ value: "justify-content-end", label: "Right" },
	];
	return (
		<ToggleGroupControl
			__nextHasNoMarginBottom
			isBlock
			label="Row alignment"
			onChange={callback}
			value={value ? value : "justify-content-start"}
		>
			{options.map((option) => {
				const label = option.label;
				const value = option.value;
				return <ToggleGroupControlOption label={label} value={value} />;
			})}
		</ToggleGroupControl>
	);
}

export default function Inspector({ attributes, setAttributes }) {
	const { rowAlignment } = attributes;

	return (
		<InspectorControls>
			<PanelBody title="Settings" initialOpen={true}>
				<ToggleGroupJustifyContent
					value={rowAlignment}
					callback={(value) => {
						setAttributes({ rowAlignment: value });
					}}
				/>
			</PanelBody>
		</InspectorControls>
	);
}
