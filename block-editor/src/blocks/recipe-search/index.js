/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import edit from './edit';

registerBlockType('yummy-recipes/recipe-search', {
  title: __('Recipe Search', 'yummy-recipes'),
  description: __('Recipe Search block', 'yummy-recipes'),
  category: 'common',
  icon: 'search',
  edit,
});
