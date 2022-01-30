import { get } from './';

export const searchRecipes = async (keyword, params) => {
  let defaultParams = {
    search: keyword,
    per_page: 6,
  };

  params = { ...defaultParams, ...params };

  let { data, headers } = await get(`yummy_recipes`, params);

  data = data.map((recipe) => ({
    id: recipe.id,
    title: recipe.title.rendered,
    description: recipe.excerpt.rendered,
    url: recipe.link,
    image: recipe.featured_image_url,
    cookingTime: recipe.meta.cooking_time,
    rating: recipe.meta.rating,
  }));

  return {
    data,
    headers,
  };
};
