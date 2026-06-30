( function () {
	var addFilter    = wp.hooks.addFilter;
	var createElement = wp.element.createElement;
	var useState     = wp.element.useState;
	var Fragment     = wp.element.Fragment;
	var BlockControls = wp.blockEditor.BlockControls;
	var LinkControl  = wp.blockEditor.__experimentalLinkControl;
	var ToolbarGroup  = wp.components.ToolbarGroup;
	var ToolbarButton = wp.components.ToolbarButton;
	var Popover      = wp.components.Popover;
	var createHigherOrderComponent = wp.compose.createHigherOrderComponent;

	var BLOCK_NAME = 'core/cover';
	var LINK_ICON = 'admin-links';

	// 1. Register custom attributes on core/cover.
	addFilter(
		'blocks.registerBlockType',
		'dc/cover-block-link-attributes',
		function ( settings, name ) {
			if ( name !== BLOCK_NAME ) {
				return settings;
			}

			settings.attributes = Object.assign( {}, settings.attributes, {
				coverLinkUrl: {
					type: 'string',
					default: '',
				},
				coverLinkNewTab: {
					type: 'boolean',
					default: false,
				},
			} );

			return settings;
		}
	);

	// 2. Add link button in block toolbar with popover link picker.
	var withCoverLinkControls = createHigherOrderComponent( function ( BlockEdit ) {
		return function ( props ) {
			if ( props.name !== BLOCK_NAME ) {
				return createElement( BlockEdit, props );
			}

			var attributes    = props.attributes;
			var setAttributes = props.setAttributes;
			var isSelected    = props.isSelected;

			var _state  = useState( false );
			var isOpen  = _state[0];
			var setOpen = _state[1];

			var hasLink = !! attributes.coverLinkUrl;

			var linkValue = {
				url: attributes.coverLinkUrl || '',
				opensInNewTab: !! attributes.coverLinkNewTab,
			};

			return createElement(
				Fragment,
				null,
				createElement( BlockEdit, props ),
				isSelected && createElement(
					BlockControls,
					{ group: 'other' },
					createElement(
						ToolbarGroup,
						null,
						createElement(
							ToolbarButton,
							{
								icon: LINK_ICON,
								label: hasLink ? 'Modifier le lien' : 'Ajouter un lien',
								onClick: function () { setOpen( ! isOpen ); },
								isPressed: hasLink,
							}
						)
					)
				),
				isOpen && createElement(
					Popover,
					{
						position: 'bottom center',
						onClose: function () { setOpen( false ); },
						anchor: document.querySelector( '.block-editor-block-toolbar' ),
						focusOnMount: 'firstElement',
					},
					createElement( LinkControl, {
						value: linkValue,
						settings: [
							{
								id: 'opensInNewTab',
								title: 'Ouvrir dans un nouvel onglet',
							},
						],
						onChange: function ( next ) {
							setAttributes( {
								coverLinkUrl: next.url || '',
								coverLinkNewTab: !! next.opensInNewTab,
							} );
						},
						onRemove: function () {
							setAttributes( {
								coverLinkUrl: '',
								coverLinkNewTab: false,
							} );
							setOpen( false );
						},
					} )
				)
			);
		};
	}, 'withCoverLinkControls' );

	addFilter(
		'editor.BlockEdit',
		'dc/cover-block-link-controls',
		withCoverLinkControls
	);

	// 3. Save data-* attributes on the wrapper for render_block to pick up.
	addFilter(
		'blocks.getSaveContent.extraProps',
		'dc/cover-block-link-extra-props',
		function ( extraProps, blockType, attributes ) {
			if ( blockType.name !== BLOCK_NAME ) {
				return extraProps;
			}

			if ( attributes.coverLinkUrl ) {
				extraProps[ 'data-cover-link-url' ] = attributes.coverLinkUrl;

				if ( attributes.coverLinkNewTab ) {
					extraProps[ 'data-cover-link-new-tab' ] = 'true';
				}
			}

			return extraProps;
		}
	);
} )();
