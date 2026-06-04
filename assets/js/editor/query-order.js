( function () {
	const { addFilter }                  = wp.hooks;
	const { createHigherOrderComponent } = wp.compose;
	const { InspectorControls }          = wp.blockEditor;
	const { PanelBody, SelectControl }   = wp.components;
	const { createElement: el, Fragment } = wp.element;

	const withQueryOrderControl = createHigherOrderComponent( function ( BlockEdit ) {
		return function ( props ) {
			if ( props.name !== 'core/query' ) {
				return el( BlockEdit, props );
			}

			const { attributes, setAttributes } = props;
			const orderby = attributes.query?.orderby || 'date';

			return el(
				Fragment,
				null,
				el( BlockEdit, props ),
				el( InspectorControls, null,
					el( PanelBody,
						{ title: 'Ordre d\'affichage', initialOpen: false },
						el( SelectControl, {
							label:    'Trier par',
							value:    orderby,
							options: [
								{ label: 'Date (récent → ancien)',       value: 'date' },
								{ label: 'Titre A → Z',                 value: 'title' },
								{ label: 'Ordre manuel (drag & drop)',   value: 'menu_order' },
							],
							onChange: function ( val ) {
								setAttributes( {
									query: Object.assign( {}, attributes.query, { orderby: val } ),
								} );
							},
						} )
					)
				)
			);
		};
	}, 'withQueryOrderControl' );

	addFilter(
		'editor.BlockEdit',
		'dc26/query-order-control',
		withQueryOrderControl
	);
} )();
