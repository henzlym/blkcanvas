import { InspectorControls } from "@wordpress/block-editor";
import {
	PanelBody,
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
			</PanelBody>
		</InspectorControls>
	);
}
