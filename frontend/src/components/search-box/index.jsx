import React from 'react';
import { searchRecipes } from '../../services/api/provider';
import { RecipesContext } from '../../context/recipes';
import { debounce } from 'lodash';

function SearchBox() {
  const [loading, setLoading] = React.useState(false);
  const {
    setRecipes,
    setTotalPages,
    setCurrentPage,
    keyword,
    setKeyword,
  } = React.useContext(RecipesContext);

  const recipesSearch = debounce(async function (keyword) {
    setLoading(true);
    let { data, headers } = await searchRecipes(keyword);
    setLoading(false);
    setTotalPages(Number(headers['x-wp-totalpages']));
    setRecipes(data);
    setCurrentPage(1);
  }, 700);

  React.useEffect(() => {
    recipesSearch(keyword);
    return recipesSearch.cancel;
  }, [keyword]);

  return (
    <div className="yummy-recipes-search-box">
      <form
        className="yummy-recipes-search-box-form"
        onSubmit={(e) => e.preventDefault()}
      >
        <input
          type="text"
          placeholder="Search recipes"
          value={keyword}
          onChange={(e) => setKeyword(e.target.value)}
        />
        <div className="yummy-recipes-search-box-spinner">
          {loading && (
            <div className="yummy-recipes-search-box-spinner-element"></div>
          )}
        </div>
      </form>
    </div>
  );
}

export default SearchBox;
