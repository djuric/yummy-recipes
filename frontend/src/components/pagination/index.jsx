import { range } from 'lodash';

function Pagination({ totalPages, currentPage, onPageClick }) {
  const pageRange = 1;
  const showItems = pageRange * 2 + 1;

  if (totalPages <= 1) {
    return null;
  }

  return (
    <nav>
      <ul className="yummy-recipes-search-results-pagination">
        {currentPage > 2 &&
          currentPage > pageRange + 1 &&
          showItems < totalPages && (
            <li className="page-item">
              <button onClick={() => onPageClick(1)} className="page-link">
                &laquo;
              </button>
            </li>
          )}

        {currentPage > 1 && showItems < totalPages && (
          <li className="page-item">
            <button
              onClick={() => onPageClick(currentPage - 1)}
              className="page-link"
            >
              &lsaquo;
            </button>
          </li>
        )}

        {range(1, totalPages + 1).map((page) => {
          if (
            !(
              page >= currentPage + pageRange + 1 ||
              page <= currentPage - pageRange - 1
            ) ||
            totalPages <= showItems
          ) {
            return (
              <li
                className={
                  page === currentPage ? 'page-item active' : 'page-item'
                }
                key={page}
              >
                <button onClick={() => onPageClick(page)} className="page-link">
                  {page}
                </button>
              </li>
            );
          }

          return null;
        })}

        {currentPage < totalPages && showItems < totalPages && (
          <li className="page-item">
            <button
              onClick={() => onPageClick(currentPage + 1)}
              className="page-link"
            >
              &rsaquo;
            </button>
          </li>
        )}

        {currentPage < totalPages - 1 &&
          currentPage + pageRange - 1 < totalPages &&
          showItems < totalPages && (
            <li className="page-item">
              <button
                onClick={() => onPageClick(totalPages)}
                className="page-link"
              >
                &raquo;
              </button>
            </li>
          )}
      </ul>
    </nav>
  );
}

export default Pagination;
