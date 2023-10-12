import { useBlockProps } from '@wordpress/block-editor';

/**
 * Renders the Save component.
 *
 * @return {JSX.Element} The rendered Save component.
 */
export const Save = () => {
  const blockProps = useBlockProps.save( {
    className: 'wc-block-product-gallery',
  } );
  return (
    <div { ...blockProps }>
      <p>loading</p>
    </div>
  );
};

export default Save;
