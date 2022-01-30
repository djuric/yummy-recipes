import SearchBox from './components/search-box';
import SearchResults from './components/search-results';
import { RecipesProvider } from './context/recipes';
import './App.scss';

function App() {
  return (
    <div className="yummy-recipes-search">
      <RecipesProvider>
        <SearchBox />
        <SearchResults />
      </RecipesProvider>
    </div>
  );
}

export default App;
