import {registerBlockType} from '@wordpress/blocks';
import {
	BlockControls,
	InspectorControls,
	RichText,
	useBlockProps
} from '@wordpress/block-editor';
import {PanelBody, TextControl} from '@wordpress/components';
import {__} from '@wordpress/i18n';
import '../../scss/components/_hero.scss';

import metadata from './block.json';

registerBlockType(metadata.name, {
	edit: (props) => {
		const {attributes, setAttributes} = props;
		const {
			title,
			subtitle,
			linkUrl,
			linkText
		} = attributes;

		const blockProps = useBlockProps({});

		return (
			<>
				<InspectorControls>
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

				<BlockControls></BlockControls>

				<div {...blockProps}>
					<div className="hero">
						<header className="hero-header">
							<div className="hero-image" id="parallax-back"></div>
							<div className="hero-parallax-overlay" id="parallax-mid"></div>
							<div className="hero-parallax-overlay" id="parallax-front"></div>
							<RichText
								tagName="h1"
								className="hero-title"
								value={title}
								onChange={(value) => setAttributes({title: value})}
								placeholder={__('Enter title...', 'ehriproject')}
							/>
							<RichText
								tagName="h2"
								className="hero-tagline"
								value={subtitle}
								onChange={(value) => setAttributes({subtitle: value})}
								placeholder={__('Enter subtitle...', 'ehriproject')}
							/>

							{linkUrl && linkText && (
								<a href={linkUrl} className="button-primary hero-link">
									{linkText}
								</a>
							)}
						</header>
					</div>
				</div>
			</>
		);
	},

	save: (props) => {
		const {attributes} = props;
		const {
			title,
			subtitle,
			linkUrl,
			linkText
		} = attributes;

		const blockProps = useBlockProps.save();

		return (
			<section {...blockProps}>
				<header className="hero-header">
					<div className="hero-image" id="parallax-back"></div>
					<div className="hero-parallax-overlay" id="parallax-mid"></div>
					<div className="hero-parallax-overlay" id="parallax-front"></div>
					{title && (
						<RichText.Content
							tagName="h1"
							className="hero-title"
							value={title}
						/>
					)}

					{subtitle && (
						<RichText.Content
							tagName="h2"
							className="hero-tagline"
							value={subtitle}
						/>
					)}

					{linkUrl && linkText && (
						<a href={linkUrl} className="button-primary hero-link">
							{linkText}
						</a>
					)}
				</header>
			</section>
		);
	}
});
