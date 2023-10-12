import { GALLERY_PLACEHOLDER } from './icons';
import { useBlockProps } from '@wordpress/block-editor';
import { Icon } from '@wordpress/icons';

/**
 * Renders a placeholder component for a product gallery.
 *
 * @return {JSX.Element} - The JSX element representing the placeholder component.
 */
const Placeholder = () => {
	return (
		<div className="wc-block-editor-product-gallery">
			<Icon
				icon={ GALLERY_PLACEHOLDER }
				style={ { height: 'auto', maxWidth: '500px', width: '100%' } }
			/>
			<div className="wc-block-editor-product-gallery__other-images">
				{ [ ...Array( 4 ).keys() ].map( ( index ) => {
					return (
						<Icon
							width={ 100 }
							height={ 100 }
							key={ index }
							style={ { margin: '5px' } }
							icon={ GALLERY_PLACEHOLDER }
						/>
					);
				} ) }
			</div>
		</div>
	);
};

export const Edit = () => {
	const blockProps = useBlockProps();
	return (
		<div { ...blockProps }>
			<Placeholder />
		</div>
	);
};

export default Edit;
