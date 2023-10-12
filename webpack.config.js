const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require('path');

module.exports = {
  ...defaultConfig,
  entry: {
    'oldwoo-gallery-block': path.resolve(
      process.cwd(),
      `src/index`
    ),
  }
};
