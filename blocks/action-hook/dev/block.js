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

	// Variables

		const
			{ __ }  = wp.i18n,
			Editor  = wp.blockEditor,
			Comp    = wp.components,
			Element = wp.element.createElement;


	// Processing

		wp.blocks.registerBlockType( 'wmd/action-hook', {

			edit: ( props ) => {

				// Variables

					const
						{ info, hooks }   = wmdActionHookBlock,
						{ name, context } = props.attributes,
						description       = ( name ) ? ( __( 'Executing this PHP code here:', 'action-hook-block' ) ) : ( __( 'Select a hook to execute here.', 'action-hook-block' ) ),
						codeName          = ( name ) ? ( Element( 'strong', {}, name ) ) : ( '' ),
						codeContext       = ( context ) ? ( Element( 'span', {}, ', ', Element( 'em', {}, '$context' ) ) ) : ( '' );


				// Output

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
							( info.top ) ? ( Element( 'p', { className: 'wp-block-wmd-action-hook-block__info--top' }, info.top ) ) : ( '' ),

							// Description text.
							Element( 'span', { className: 'description' }, description ),

							// PHP code preview.
							( name ) ? ( Element( 'code', {}, "do_action( '", codeName, "'", codeContext, " );" ) ) : ( '' ),

							// Additional info at bottom.
							( info.bottom ) ? ( Element( 'p', { className: 'wp-block-wmd-action-hook-block__info--bottom' }, info.bottom ) ) : ( '' ),

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

				// Processing

					// No need to output anything, just save the options.
					Editor.useBlockProps.save();
			},

		} );

} )( window.wp );
