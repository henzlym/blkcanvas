import { InspectorControls, PanelColorSettings } from "@wordpress/block-editor";
import { PanelBody, SelectControl, ToggleControl } from "@wordpress/components";

export default function Inspector({ attributes, setAttributes }) {
	const { backgroundColor, textColor, tagName, fullWidth } = attributes;

	return (
		<InspectorControls>
			<PanelBody title="Container Settings" initialOpen={true}>
				<SelectControl
					label="Tag Element"
					value={tagName}
					options={[
						{ value: "header", label: "Header" },
						{ value: "footer", label: "Footer" },
						{ value: "main", label: "Main" },
						{ value: "aside", label: "Aside" },
						{ value: "article", label: "Article" },
						{ value: "section", label: "Section" },
						{ value: "div", label: "Div" },
					]}
					onChange={(tagName) => setAttributes({ tagName })}
				/>
				<ToggleControl
					label="Full Width"
					checked={fullWidth}
					onChange={(fullWidth) => setAttributes({ fullWidth })}
				/>
			</PanelBody>
			<PanelColorSettings
				title="Color Settings"
				initialOpen={false}
				colorSettings={[
					{
						value: backgroundColor,
						onChange: (color) => setAttributes({ backgroundColor: color }),
						label: "Background Color",
					},
					{
						value: textColor,
						onChange: (color) => setAttributes({ textColor: color }),
						label: "Text Color",
					},
				]}
			/>
		</InspectorControls>
	);
}
