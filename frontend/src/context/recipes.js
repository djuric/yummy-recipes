import React from 'react';

export const RecipesContext = React.createContext({
  recipes: [],
});

export const RecipesProvider = ({ children }) => {
  const [recipes, setRecipes] = React.useState([]);
  const [totalPages, setTotalPages] = React.useState(0);
  const [currentPage, setCurrentPage] = React.useState(1);
  const [keyword, setKeyword] = React.useState('');

  return (
    <RecipesContext.Provider
      value={{
        recipes,
        setRecipes,
        totalPages,
        setTotalPages,
        currentPage,
        setCurrentPage,
        keyword,
        setKeyword,
      }}
    >
      {children}
    </RecipesContext.Provider>
  );
};
