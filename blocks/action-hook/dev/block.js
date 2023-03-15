/**
 * Block editor script.
 *
 * @package    Action Hook Block
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

( ( wp ) => {
	'use strict';

	const
		{ __ }  = wp.i18n,
		Editor  = wp.blockEditor,
		Comp    = wp.components,
		Element = wp.element.createElement;

	wp.blocks.registerBlockType( 'wmd/action-hook', {

		edit: ( props ) => {

			const
				{ info, hooks }   = wmdActionHookBlock,
				{ name, context } = props.attributes,
				description       = ( name ) ? ( __( 'Executing this PHP code here:', 'action-hook-block' ) ) : ( __( 'Select a hook to execute here.', 'action-hook-block' ) ),
				codeContext       = ( context ) ? ( ', $context' ) : ( '' );

			return Element(

				/**
				 * Preview wrapper container.
				 */
				'div',
				Editor.useBlockProps( {
					className: ( name ) ? ( 'has-hook-selected' ) : ( '' ),
				} ),

				/**
				 * Preview inner elements.
				 */

					// Additional info at top.
					( info.top ) ? ( Element( 'p', { class: 'wp-block-wmd-action-hook-block__info--top' }, info.top ) ) : ( '' ),

					// Description text.
					Element( 'span', {}, description ),

					// PHP code preview.
					( name ) ? ( Element( 'code', {}, "do_action( '" + name + "'" + codeContext + " );" ) ) : ( '' ),

					// Additional info at bottom.
					( info.bottom ) ? ( Element( 'p', { class: 'wp-block-wmd-action-hook-block__info--bottom' }, info.bottom ) ) : ( '' ),

				/**
				 * Block settings sidebar.
				 */
				Element( Editor.InspectorControls, {},
					Element( Comp.PanelBody, {},
						Element( Comp.SelectControl,
							{
								label    : __( 'Hook name', 'action-hook-block' ),
								value    : name,
								options  : hooks,
								onChange : ( newValue ) => props.setAttributes( { name: newValue } ),
							}
						),
						Element( Comp.TextControl,
							{
								label    : __( 'Optional context', 'action-hook-block' ),
								help     : __( 'Context value will be passed into the action hook as an additional argument.', 'action-hook-block' ),
								value    : context,
								onChange : ( newValue ) => props.setAttributes( { context: newValue } ),
							}
						),
					),
				)

			);
		},

		save: function () {
			// No need to output anything, just save the options.
			Editor.useBlockProps.save();
		},

	} );

} )( window.wp );
