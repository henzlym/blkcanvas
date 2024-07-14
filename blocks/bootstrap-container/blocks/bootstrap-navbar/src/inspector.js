import { InspectorControls, PanelColorSettings } from "@wordpress/block-editor";
import {
	PanelBody,
	RangeControl,
	SelectControl,
	TextControl,
	ToggleControl,
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption,
} from "@wordpress/components";
import { store as coreStore } from "@wordpress/core-data";
import { useSelect } from "@wordpress/data";
import { useState } from "@wordpress/element";

function ToggleGroupBreakpoints({ activeBreakpoint, setBreakpoint }) {
	const options = [
		{ value: "default", label: "All" },
		{ value: "sm", label: "S" },
		{ value: "md", label: "M" },
		{ value: "lg", label: "L" },
		{ value: "xl", label: "XL" },
		{ value: "xxl", label: "XXL" },
	];

	if (!options || options.length === 0) {
		return null;
	}

	return (
		<ToggleGroupControl
			__nextHasNoMarginBottom
			isBlock
			label="Spacing"
			onChange={(breakpoint) => setBreakpoint(breakpoint)}
			value={activeBreakpoint}
		>
			{options.map((option) => {
				const label = option.label;
				const value = option.value;
				return <ToggleGroupControlOption label={label} value={value} />;
			})}
		</ToggleGroupControl>
	);
}

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
			label="Navigation justify elements"
			onChange={callback}
			value={value ?? "justify-content-start"}
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
		padding,
		navigationAlignment,
	} = attributes;
	const [activeBreakpoint, setBreakpoint] = useState("default");

	console.log({ activeBreakpoint, setBreakpoint });
	const menus = useSelect((select) => {
		return select(coreStore).getMenus();
	}, []);

	const menuOptions = menus
		? menus.map((menu) => ({ value: menu.id, label: menu.name }))
		: [];

	const breakpoints = ["default", "sm", "md", "lg", "xl", "xxl"];

	const updatePadding = (side, breakpoint, value) => {
		setAttributes({
			padding: {
				...padding,
				[side]: {
					...padding[side],
					[breakpoint]: value,
				},
			},
		});
	};

	const renderPaddingControls = (side) => {
		return breakpoints
			.filter((breakpoint) => breakpoint == activeBreakpoint)
			.map((breakpoint) => (
				<RangeControl
					label={`Padding ${
						side.charAt(0).toUpperCase() + side.slice(1)
					} (${breakpoint.toUpperCase()})`}
					value={padding[side][breakpoint]}
					onChange={(value) => updatePadding(side, breakpoint, value)}
					min={0}
					max={5}
					key={`${side}-${breakpoint}`}
					allowReset={true}
					marks={true}
					step={1}
					withInputField={false}
					initialPosition={3}
				/>
			));
	};

	return (
		<InspectorControls>
			<PanelBody title="Navbar Settings" initialOpen={true}>
				<SelectControl
					label="Select Menu"
					value={selectedMenu}
					options={[{ value: "", label: "None" }, ...menuOptions]}
					onChange={(selectedMenu) =>
						setAttributes({ selectedMenu: parseInt(selectedMenu) })
					}
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
				<ToggleGroupBreakpoints {...{ activeBreakpoint, setBreakpoint }} />
				{["top", "start", "end", "bottom"].map((side) =>
					renderPaddingControls(side),
				)}
			</PanelBody>
			<PanelBody title="Nav Settings" initialOpen={true}>
				<ToggleGroupJustifyContent
					value={navigationAlignment}
					callback={(value) => {
						setAttributes({ navigationAlignment: value });
					}}
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
