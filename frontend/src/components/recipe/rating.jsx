import { times } from 'lodash';
import { Icon } from 'react-icons-kit';
import { starEmpty } from 'react-icons-kit/icomoon/starEmpty';
import { starFull } from 'react-icons-kit/icomoon/starFull';

function Rating({ stars }) {
  return (
    <div className="yummy-recipes-search-results-item-rating">
      {times(5, (i) =>
        i + 1 <= stars ? (
          <Icon icon={starFull} key={i} />
        ) : (
          <Icon icon={starEmpty} key={i} />
        )
      )}
    </div>
  );
}

export default Rating;
