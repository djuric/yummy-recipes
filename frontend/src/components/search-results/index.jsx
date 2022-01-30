import Recipe from '../recipe';
import React from 'react';
import { searchRecipes } from '../../services/api/provider';
import { RecipesContext } from '../../context/recipes';
import Pagination from '../pagination';

function SearchResults() {
  const {
    recipes,
    setRecipes,
    totalPages,
    setTotalPages,
    keyword,
    currentPage,
    setCurrentPage,
  } = React.useContext(RecipesContext);

  React.useEffect(() => {
    (async () => {
      const { data, headers } = await searchRecipes('');
      setRecipes(data);
      setTotalPages(Number(headers['x-wp-totalpages']));
    })();
  }, []);

  const onPageClick = async (page) => {
    const { data, headers } = await searchRecipes(keyword, {
      page,
    });
    setRecipes(data);
    setTotalPages(Number(headers['x-wp-totalpages']));
    setCurrentPage(page);
  };

  return (
    <>
      <div className="yummy-recipes-search-results">
        {recipes.map((recipe) => (
          <Recipe key={recipe.id} data={recipe} />
        ))}
        {recipes.length === 0 && (
          <div className="yummy-recipes-search-results-no-results">
            No recipes found.
          </div>
        )}
      </div>
      {recipes.length > 0 && (
        <Pagination
          totalPages={totalPages}
          currentPage={currentPage}
          onPageClick={onPageClick}
        />
      )}
    </>
  );
}

export default SearchResults;
