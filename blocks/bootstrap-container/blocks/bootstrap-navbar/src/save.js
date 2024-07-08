import { useBlockProps } from "@wordpress/block-editor";

export default function save({ attributes }) {
	const {
		navbarBrand,
		selectedMenu,
		enableSearch,
		searchLabel,
		searchPlaceholder,
		searchButtonText,
		navbarBrandMaxWidth,
	} = attributes;
	const blockProps = useBlockProps.save({
		className: "navbar navbar-expand-lg bg-body-tertiary",
	});

	const siteTitle = wp.element.createElement("span", {
		dangerouslySetInnerHTML: {
			__html: wp.i18n.__("Your Site Title", "bootstrap-navbar"),
		},
	});

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
			<div className="container-fluid">
				{navbarBrand ? (
					<img
						src={navbarBrand}
						alt={siteTitle}
						className="navbar-brand"
						style={{ maxWidth: `${navbarBrandMaxWidth}%` }}
					/>
				) : (
					<a className="navbar-brand" href="#">
						{siteTitle}
					</a>
				)}
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
					{selectedMenu && (
						<ul className="navbar-nav me-auto mb-2 mb-lg-0">
							{renderMenuItems(selectedMenu)}
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