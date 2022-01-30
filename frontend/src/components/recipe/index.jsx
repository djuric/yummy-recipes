import CookingTime from './cooking-time';
import Rating from './rating';

function Recipe({ data }) {
  const { title, url, description, image, cookingTime, rating } = data;

  return (
    <div className="yummy-recipes-search-results-item">
      <div className="yummy-recipes-search-results-item-image">
        <a href={url}>
          <img src={image} />
        </a>
      </div>
      <div className="yummy-recipes-search-results-item-title">
        <h3>
          <a href={url}>
            <div dangerouslySetInnerHTML={{ __html: title }} />
          </a>
        </h3>
      </div>
      <div className="yummy-recipes-search-results-item-description">
        <div dangerouslySetInnerHTML={{ __html: description }} />
      </div>
      <div className="yummy-recipes-search-results-item-details">
        {cookingTime > 0 && <CookingTime minutes={cookingTime} />}
        {rating > 0 && <Rating stars={rating} />}
      </div>
    </div>
  );
}

export default Recipe;
