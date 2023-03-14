/**
 * Block editor script.
 *
 * @package    Action Block
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

( ( wp ) => {
	'use strict';

	const __ = wp.i18n.__;

	wp.blocks.registerBlockType( 'wmd/action-block', {

		edit: ( props ) => {

			const
				name    = props.attributes.name,
				context = props.attributes.context,
				info    = {
					top: ( wmdActionBlock.info.top ) ? ( wp.element.createElement( 'p', { class: 'wp-block-wmd-action-block__info--top' }, wmdActionBlock.info.top ) ) : ( '' ),
					bottom: ( wmdActionBlock.info.bottom ) ? ( wp.element.createElement( 'p', { class: 'wp-block-wmd-action-block__info--bottom' }, wmdActionBlock.info.bottom ) ) : ( '' ),
				};

			let
				description = __( 'Executing this PHP code here:', 'action-block' ),
				code        = wp.element.createElement( 'code', {}, "do_action( '" + name + "' );" );

			if ( '' === name ) {
				description = __( 'Select a hook to execute here.', 'action-block' )
				code        = '';
			}

			return wp.element.createElement( 'div', wp.blockEditor.useBlockProps(),
				wp.element.createElement( wp.blockEditor.InspectorControls, {},
					wp.element.createElement( wp.components.Panel, {},
						wp.element.createElement( wp.components.PanelBody, {},
							wp.element.createElement( wp.components.SelectControl,
								{
									label    : __( 'Hook name', 'action-block' ),
									value    : name,
									options  : wmdActionBlock.hooks,
									onChange : ( newName ) => props.setAttributes( { name: newName } ),
								}
							),
							wp.element.createElement( wp.components.TextControl,
								{
									label    : __( 'Optional context', 'action-block' ),
									help     : __( 'Context value will be passed into the action hook as an additional argument.', 'action-block' ),
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
