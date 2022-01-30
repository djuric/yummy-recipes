import { Icon } from 'react-icons-kit';
import { clock } from 'react-icons-kit/icomoon/clock';

function CookingTime({ minutes }) {
  const hours = Math.floor(minutes / 60);

  const partials = [];
  if (hours > 0) {
    partials.push(`${hours}h`);
  }

  if (minutes % 60 > 0) {
    if (hours > 0) {
      partials.push('and');
    }
    partials.push(`${minutes % 60}min`);
  }

  return (
    <div className="yummy-recipes-search-results-item-cooking-time">
      <Icon icon={clock} />{' '}
      <div className="yummy-recipes-search-results-item-cooking-time-text">
        {partials.join(' ')}
      </div>
    </div>
  );
}

export default CookingTime;
