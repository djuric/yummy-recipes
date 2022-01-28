/**
 * WordPress dependencies
 */
import { Card, CardHeader, CardBody } from '@wordpress/components';
import { Placeholder } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

const Edit = () => (
  <Card>
    <CardHeader>{__('Recipe Search', 'yummy-recipes')}</CardHeader>
    <CardBody>
      <Placeholder icon="search" label={__('Search', 'yummy-recipes')} />
    </CardBody>
  </Card>
);

export default Edit;
