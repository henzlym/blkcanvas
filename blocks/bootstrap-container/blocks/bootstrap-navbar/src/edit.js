import {
	MediaUpload,
	MediaUploadCheck,
	useBlockProps,
} from "@wordpress/block-editor";
import { Button } from "@wordpress/components";
import { store as coreStore } from "@wordpress/core-data";
import { useSelect } from "@wordpress/data";
import Inspector from "./inspector";
import useNavigationEntities from "./use-navigation-entities";

export default function Edit({ attributes, setAttributes }) {
	const {
		navbarBrand,
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
	} = attributes;

	const breakpoints = ["default", "sm", "md", "lg", "xl", "xxl"];
	const paddingClasses = Object.keys(padding)
		.map((side) => {
			return breakpoints
				.filter((breakpoint) => padding[side][breakpoint])
				.map((breakpoint) => {
					return `p${side.charAt(0)}${
						breakpoint === "default" ? "" : `-${breakpoint}`
					}-${padding[side][breakpoint]}`;
				})
				.join(" ");
		})
		.join(" ");

	const blockProps = useBlockProps({
		className: `navbar navbar-expand-lg bg-body-tertiary ${paddingClasses}`,
		style: {
			backgroundColor,
			color: linkColor,
		},
	});

	const { title } = useSelect((select) => {
		const siteEntities = select(coreStore).getEntityRecord(
			"root",
			"__unstableBase",
		);
		return {
			title: siteEntities?.name,
		};
	}, []);

	const { menuItems } = useNavigationEntities(selectedMenu);

	const onSelectImage = (media) => {
		setAttributes({ navbarBrand: media.url });
	};

	const onRemoveImage = () => {
		setAttributes({ navbarBrand: "" });
	};

	const renderMenuItems = (items, parentId = 0) => {
		return items
			.filter((item) => item.parent === parentId)
			.map((item) => {
				const children = items.filter((child) => child.parent === item.id);
				return (
					<li
						key={item.id}
						className={`nav-item ${children.length > 0 ? "dropdown" : ""}`}
					>
						<a
							className={`nav-link ${
								children.length > 0 ? "dropdown-toggle" : ""
							}`}
							href={item.url}
							{...(children.length > 0 ? { "data-bs-toggle": "dropdown" } : {})}
						>
							{item.title.rendered}
						</a>
						{children.length > 0 && (
							<ul className="dropdown-menu">
								{renderMenuItems(items, item.id)}
							</ul>
						)}
					</li>
				);
			});
	};

	return (
		<nav {...blockProps}>
			<div className={fullWidth ? "container-fluid" : "container"}>
				{navbarBrand ? (
					<img
						src={navbarBrand}
						alt={title}
						className="navbar-brand"
						style={{ maxWidth: `${navbarBrandMaxWidth}px` }}
					/>
				) : (
					<a className="navbar-brand" href="#">
						{title}
					</a>
				)}
				<MediaUploadCheck>
					<MediaUpload
						onSelect={onSelectImage}
						allowedTypes={["image"]}
						value={navbarBrand}
						render={({ open }) => (
							<div>
								<Button onClick={open} variant="primary">
									{navbarBrand ? "Change Image" : "Upload Image"}
								</Button>
								{navbarBrand && (
									<Button
										onClick={onRemoveImage}
										variant="secondary"
										className="ml-2"
									>
										Remove Image
									</Button>
								)}
							</div>
						)}
					/>
				</MediaUploadCheck>
				<Inspector {...{ attributes, setAttributes }} />
				<button
					className="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span className="navbar-toggler-icon"></span>
				</button>
				<div className="collapse navbar-collapse" id="navbarSupportedContent">
					{selectedMenu && menuItems && (
						<ul className="navbar-nav me-auto mb-2 mb-lg-0">
							{renderMenuItems(menuItems)}
						</ul>
					)}
					{enableSearch && (
						<form className="d-flex" role="search">
							<label htmlFor="navbarSearch" className="visually-hidden">
								{searchLabel}
							</label>
							<input
								className="form-control me-2"
								type="search"
								id="navbarSearch"
								placeholder={searchPlaceholder}
								aria-label={searchLabel}
							/>
							<button className="btn btn-outline-success" type="submit">
								{searchButtonText}
							</button>
						</form>
					)}
				</div>
			</div>
		</nav>
	);
}
