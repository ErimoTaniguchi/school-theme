/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls, InnerBlocks } from '@wordpress/block-editor';
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * React components required for the sidebar controls.
 */
import { PanelBody, SelectControl } from '@wordpress/components';
/**
 * The edit function describes the structure of your block in the context of the editor.
 *
 * @param {Object}   props            Properties passed to the function.
 * @param {Object}   props.attributes Block attributes.
 * @param {Function} props.setAttributes Function to set block attributes.
 * @return {Element} Element to render.
 */

export default function Edit( { attributes, setAttributes } ) {
	const { aosAnimation } = attributes;
	const blockProps = useBlockProps();

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'AOS Animation Settings', 'school-blocks' ) }>
					<SelectControl
						label={ __( 'Animation Type', 'school-blocks' ) }
						value={ aosAnimation }
						options={ [
							{ label: __( 'Fade', 'school-blocks' ), value: 'fade' },
							{ label: __( 'Fade Up', 'school-blocks' ), value: 'fade-up' },
							{ label: __( 'Fade Down', 'school-blocks' ), value: 'fade-down' },
							{ label: __( 'Fade Right', 'school-blocks' ), value: 'fade-right' },
							{ label: __( 'Fade Left', 'school-blocks' ), value: 'fade-left' },
						] }
						onChange={ ( value ) => setAttributes( { aosAnimation: value } ) }
					/>
				</PanelBody>
			</InspectorControls>
			
			<div { ...blockProps } data-aos={ aosAnimation }>
				<InnerBlocks />
			</div>
		</>
	);
}