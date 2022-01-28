const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
  ...defaultConfig,
  entry: {
    index: path.resolve(process.cwd(), 'block-editor/src/blocks', 'index.js'),
    style: path.resolve(process.cwd(), 'block-editor/src/blocks', 'style.scss'),
    editor: path.resolve(
      process.cwd(),
      'block-editor/src/blocks',
      'editor.scss'
    ),
  },
  output: {
    path: path.resolve(process.cwd(), 'block-editor/dist'),
  },
};
