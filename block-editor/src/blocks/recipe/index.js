/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import edit from './edit';

registerBlockType('yummy-recipes/recipe', {
  title: __('Recipe', 'yummy-recipes'),
  description: __('Recipe details block', 'yummy-recipes'),
  category: 'common',
  icon: 'food',

  attributes: {
    rating: {
      type: 'number',
      default: 5,
      source: 'meta',
      meta: 'rating',
    },
    cookingTime: {
      type: 'number',
      default: 60,
      source: 'meta',
      meta: 'cooking_time',
    },
  },

  edit,
});
