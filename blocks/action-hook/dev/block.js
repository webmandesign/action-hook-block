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

	const { __ } = wp.i18n;

	wp.blocks.registerBlockType( 'wmd/action-hook', {

		edit: ( props ) => {

			const
				{ name, context } = props.attributes,
				info = {
					top: ( wmdActionHookBlock.info.top ) ? ( wp.element.createElement( 'p', { class: 'wp-block-wmd-action-hook-block__info--top' }, wmdActionHookBlock.info.top ) ) : ( '' ),
					bottom: ( wmdActionHookBlock.info.bottom ) ? ( wp.element.createElement( 'p', { class: 'wp-block-wmd-action-hook-block__info--bottom' }, wmdActionHookBlock.info.bottom ) ) : ( '' ),
				};

			let
				description = __( 'Executing this PHP code here:', 'action-hook-block' ),
				codeContext = ( context ) ? ( ', $context' ) : ( '' ),
				code        = wp.element.createElement( 'code', {}, "do_action( '" + name + "'" + codeContext + " );" );

			if ( '' === name ) {
				description = __( 'Select a hook to execute here.', 'action-hook-block' )
				code        = '';
			}

			return wp.element.createElement( 'div', wp.blockEditor.useBlockProps( {
					className: ( code ) ? ( 'has-hook-selected' ) : ( '' ),
        } ),
				wp.element.createElement( wp.blockEditor.InspectorControls, {},
					wp.element.createElement( wp.components.Panel, {},
						wp.element.createElement( wp.components.PanelBody, {},
							wp.element.createElement( wp.components.SelectControl,
								{
									label    : __( 'Hook name', 'action-hook-block' ),
									value    : name,
									options  : wmdActionHookBlock.hooks,
									onChange : ( newName ) => props.setAttributes( { name: newName } ),
								}
							),
							wp.element.createElement( wp.components.TextControl,
								{
									label    : __( 'Optional context', 'action-hook-block' ),
									help     : __( 'Context value will be passed into the action hook as an additional argument.', 'action-hook-block' ),
									value    : context,
									onChange : ( newContext ) => props.setAttributes( { context: newContext } ),
								}
							),
						),
					),
				),
				info.top,
				wp.element.createElement( 'span', {}, description ),
				code,
				info.bottom
			);
		},

		save: function () {
			// No need to output anything, just save the options.
			wp.blockEditor.useBlockProps.save();
		},

	} );

} )( window.wp );
