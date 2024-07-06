import { InspectorControls, PanelColorSettings } from "@wordpress/block-editor";
import {
	PanelBody,
	RangeControl,
	SelectControl,
	TextControl,
	ToggleControl,
} from "@wordpress/components";
import { store as coreStore } from "@wordpress/core-data";
import { useSelect } from "@wordpress/data";

export default function Inspector({ attributes, setAttributes }) {
	const {
		selectedMenu,
		enableSearch,
		searchLabel,
		searchPlaceholder,
		searchButtonText,
		navbarBrandMaxWidth,
		fullWidth,
		backgroundColor,
		linkColor,
	} = attributes;

	const menus = useSelect((select) => {
		return select(coreStore).getMenus();
	}, []);

	const menuOptions = menus
		? menus.map((menu) => ({ value: menu.id, label: menu.name }))
		: [];

	return (
		<InspectorControls>
			<PanelBody title="Navbar Settings" initialOpen={true}>
				<SelectControl
					label="Select Menu"
					value={selectedMenu}
					options={[{ value: "", label: "None" }, ...menuOptions]}
					onChange={(selectedMenu) => setAttributes({ selectedMenu })}
				/>
				<ToggleControl
					label="Enable Search Form"
					checked={enableSearch}
					onChange={(enableSearch) => setAttributes({ enableSearch })}
				/>
				{enableSearch && (
					<>
						<TextControl
							label="Search Input Label"
							value={searchLabel}
							onChange={(searchLabel) => setAttributes({ searchLabel })}
						/>
						<TextControl
							label="Search Input Placeholder"
							value={searchPlaceholder}
							onChange={(searchPlaceholder) =>
								setAttributes({ searchPlaceholder })
							}
						/>
						<TextControl
							label="Search Button Text"
							value={searchButtonText}
							onChange={(searchButtonText) =>
								setAttributes({ searchButtonText })
							}
						/>
					</>
				)}
				<RangeControl
					label="Navbar Brand Max Width (px)"
					value={navbarBrandMaxWidth}
					onChange={(navbarBrandMaxWidth) =>
						setAttributes({ navbarBrandMaxWidth })
					}
					min={0}
					max={300}
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
						value: linkColor,
						onChange: (color) => setAttributes({ linkColor: color }),
						label: "Link Color",
					},
				]}
			/>
		</InspectorControls>
	);
}
