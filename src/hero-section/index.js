import {registerBlockType} from '@wordpress/blocks';
import {
	AlignmentToolbar,
	BlockControls,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
	RichText,
	useBlockProps
} from '@wordpress/block-editor';
import {Button, PanelBody, TextControl} from '@wordpress/components';
import {__} from '@wordpress/i18n';
import '../../scss/components/_hero.scss';

import metadata from './block.json';

registerBlockType(metadata.name, {
	edit: (props) => {
		const {attributes, setAttributes} = props;
		const {
			text,
			alignment,
		} = attributes;

		const blockProps = useBlockProps({
			className: `align-${alignment}`
		});

		return (
			<>
				<BlockControls>
					<AlignmentToolbar
						value={alignment}
						onChange={(newAlignment) => setAttributes({alignment: newAlignment})}
					/>
				</BlockControls>

				<div {...blockProps}>
					<div className="hero-body">
						<RichText
							tagName="p"
							value={text}
							onChange={(value) => setAttributes({text: value})}
							placeholder={__('Enter hero text...', 'ehriproject')}
						/>
					</div>
				</div>
			</>
		);
	},

	save: (props) => {
		const {attributes} = props;
		const {
			text,
			alignment
		} = attributes;

		const blockProps = useBlockProps.save({
			className: `align-${alignment}`
		});

		return (
			<div {...blockProps}>
				<div className="hero-body">
					{text && (
						<RichText.Content
							tagName="p"
							value={text}
						/>
					)}
				</div>
			</div>
		);
	}
});
