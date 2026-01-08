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
import '../../scss/components/_resource-teaser.scss';

import metadata from './block.json';

registerBlockType(metadata.name, {
	edit: (props) => {
		const {attributes, setAttributes} = props;
		const {
			imageUrl,
			imageId,
			imageAlt,
			title,
			description,
			linkUrl,
			linkText,
			alignment
		} = attributes;

		const blockProps = useBlockProps({
			className: `align-${alignment}`
		});

		const onSelectImage = (media) => {
			setAttributes({
				imageUrl: media.url,
				imageId: media.id,
				imageAlt: media.alt
			});
		};

		const removeImage = () => {
			setAttributes({
				imageUrl: '',
				imageId: null,
				imageAlt: ''
			});
		};

		return (
			<>
				<InspectorControls>
					<PanelBody title={__('Image Settings', 'ehriproject')}>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={onSelectImage}
								allowedTypes={['image']}
								value={imageId}
								render={({open}) => (
									<>
										{imageUrl ? (
											<>
												<img
													src={imageUrl}
													alt={imageAlt}
													style={{width: '100%', marginBottom: '10px'}}
												/>
												<Button
													onClick={open}
													variant="secondary"
													style={{marginRight: '10px'}}
												>
													{__('Replace Image', 'ehriproject')}
												</Button>
												<Button
													onClick={removeImage}
													variant="secondary"
													isDestructive
												>
													{__('Remove Image', 'ehriproject')}
												</Button>
											</>
										) : (
											<Button onClick={open} variant="primary">
												{__('Select Image', 'ehriproject')}
											</Button>
										)}
									</>
								)}
							/>
						</MediaUploadCheck>

						<TextControl
							label={__('Image Alt Text', 'ehriproject')}
							value={imageAlt}
							onChange={(value) => setAttributes({imageAlt: value})}
							style={{marginTop: '15px'}}
						/>
					</PanelBody>

					<PanelBody title={__('Link Settings', 'ehriproject')}>
						<TextControl
							label={__('Link URL', 'ehriproject')}
							value={linkUrl}
							onChange={(value) => setAttributes({linkUrl: value})}
							placeholder="https://example.com"
						/>
						<TextControl
							label={__('Link Text', 'ehriproject')}
							value={linkText}
							onChange={(value) => setAttributes({linkText: value})}
						/>
					</PanelBody>
				</InspectorControls>

				<BlockControls>
					<AlignmentToolbar
						value={alignment}
						onChange={(newAlignment) => setAttributes({alignment: newAlignment})}
					/>
				</BlockControls>

				<div {...blockProps}>
					<div className="resource-teaser">
						{imageUrl && (
							<div className="resource-teaser-media">
								<img src={imageUrl} alt={imageAlt}/>
							</div>
						)}

						<header className="resource-teaser-header">
							<RichText
								tagName="h2"
								className="resource-teaser-title"
								value={title}
								onChange={(value) => setAttributes({title: value})}
								placeholder={__('Enter title...', 'ehriproject')}
							/>
						</header>

						<div className="resource-teaser-description">
							<RichText
								tagName="p"
								value={description}
								onChange={(value) => setAttributes({description: value})}
								placeholder={__('Enter description...', 'ehriproject')}
							/>
						</div>

						{linkUrl && linkText && (
							<a href={linkUrl} className="button-primary resource-teaser-link">
								{linkText}
							</a>
						)}
					</div>
				</div>
			</>
		);
	},

	save: (props) => {
		const {attributes} = props;
		const {
			imageUrl,
			imageAlt,
			title,
			description,
			linkUrl,
			linkText,
			alignment
		} = attributes;

		const blockProps = useBlockProps.save({
			className: `align-${alignment}`
		});

		return (
			<div {...blockProps}>
				<section className="resource-teaser">
					{imageUrl && (
						<div className="resource-teaser-media">
							<img src={imageUrl} alt={imageAlt}/>
						</div>
					)}

					<div className="resource-teaser-header">
						{title && (
							<RichText.Content
								tagName="h2"
								className="resource-teaser-title"
								value={title}
							/>
						)}
					</div>

					<div className="resource-teaser-description">
						{description && (
							<RichText.Content
								tagName="p"
								value={description}
							/>
						)}

						{linkUrl && linkText && (
							<a href={linkUrl} className="resource-teaser-link">
								{linkText}
							</a>
						)}
					</div>
				</section>
			</div>
		);
	}
});
