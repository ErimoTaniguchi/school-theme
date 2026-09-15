/**
* Retrieves the translation of text.
*
* @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
*/
import { __ } from '@wordpress/i18n';

/**
* Provides utilities to interact with block props and render block content.
* - useBlockProps: Handles block wrapper attributes like className and styles.
* - RichText: A component for rich text editing within blocks.
* - InspectorControls: Allows adding custom controls to the block editor sidebar.
*
* @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/
*/
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';

/**
* Enables interaction with WordPress entities (e.g., posts, users) using the core data store.
* - useEntityProp: Allows easy access to WordPress custom fields.
*
* @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-core-data/#useentityprop
*/
import {
	useEntityProp,
	useEntityRecords,
} from '@wordpress/core-data';

/**
* Provides pre-built UI components for creating block settings in the editor.
* - PanelBody: Groups settings into collapsible panels.
* - PanelRow: Lays out content or controls in rows within a panel.
* - ToggleControl: A toggle switch control for boolean settings.
*
* @see https://developer.wordpress.org/block-editor/reference-guides/components/panel/
* @see https://developer.wordpress.org/block-editor/reference-guides/components/toggle-control/
*/
import { PanelBody, PanelRow, ToggleControl } from '@wordpress/components';

/**
* The edit function describes the structure of your block in the context of the
* editor. This represents what the editor will render when the block is used.
*
* @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
*
* @return {Element} Element to render.
*/
export default function Edit( { attributes, setAttributes } ) {
	const { records: pages, isResolving } = useEntityRecords(
		'postType',
		'page',
		{
			slug: 'contact-info',
			per_page: 1,
		}
	);

	if ( isResolving ) {
		return <p>Loading...</p>;
	}

	const contactPage = pages?.[0];

	if ( ! contactPage ) {
		return <p>Contact Info page not found.</p>;
	}

	return (
		<EmailEditor
			postID={ contactPage.id }
			attributes={ attributes }
			setAttributes={ setAttributes }
		/>
	);
}

function EmailEditor( { postID, attributes, setAttributes } ) {
	const [ meta, setMeta ] = useEntityProp(
		'postType',
		'page',
		'meta',
		postID
	);

	const { company_email = '' } = meta || {};

	const updateMeta = ( key, value ) => {
		setMeta( {
			...( meta || {} ),
			[key]: value,
		} );
	};

	const { svgIcon } = attributes;

	return (
		<>
			<div { ...useBlockProps() }>
				<RichText
					placeholder={ __( 'Enter email here...', 'company-email' ) }
					tagName="p"
					value={ company_email }
					onChange={ ( nextValue ) =>
						updateMeta( 'company_email', nextValue )
					}
				/>
			</div>

			<InspectorControls>
				<PanelBody title={ __( 'Settings', 'company-email' ) }>
					<PanelRow>
						<ToggleControl
							label={ __( 'Show SVG Icon', 'company-email' ) }
							checked={ svgIcon }
							onChange={ ( value ) =>
								setAttributes( { svgIcon: value } )
							}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
		</>
	);
}