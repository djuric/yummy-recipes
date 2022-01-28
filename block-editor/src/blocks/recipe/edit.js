/**
 * WordPress dependencies
 */
import {
  Card,
  CardHeader,
  CardBody,
  RangeControl,
  __experimentalNumberControl as NumberControl,
  TextareaControl,
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { compose } from '@wordpress/compose';
import { withSelect, withDispatch } from '@wordpress/data';

const Edit = ({
  attributes: { rating, cookingTime },
  excerpt,
  className,
  onSetExcerpt,
  setAttributes,
}) => (
  <Card>
    <CardHeader>{__('Recipe', 'yummy-recipes')}</CardHeader>
    <CardBody>
      <div className={`${className}-field`}>
        <RangeControl
          label={__('Rating', 'yummy-recipes')}
          value={rating}
          onChange={(rating) => setAttributes({ rating })}
          min={1}
          max={5}
        />
      </div>
      <div className={`${className}-field`}>
        <NumberControl
          label={__('Cooking Time (in minutes)', 'yummy-recipes')}
          isShiftStepEnabled={true}
          onChange={(cookingTime) => setAttributes({ cookingTime })}
          shiftStep={10}
          value={cookingTime}
          required={true}
        />
      </div>
      <div className={`${className}-field`}>
        <TextareaControl
          label={__('Short Description (excerpt)', 'yummy-recipes')}
          value={excerpt}
          onChange={(excerpt) => onSetExcerpt(excerpt)}
        />
      </div>
    </CardBody>
  </Card>
);

export default compose([
  withSelect((select) => {
    return {
      excerpt: select('core/editor').getEditedPostAttribute('excerpt'),
    };
  }),
  withDispatch((dispatch) => ({
    onSetExcerpt(excerpt) {
      dispatch('core/editor').editPost({ excerpt });
    },
  })),
])(Edit);
