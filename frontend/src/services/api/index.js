let BASE_URL = process.env.REACT_APP_API_URL;

if (process.env.NODE_ENV === 'production') {
  BASE_URL = window.yummy_recipes.ajax_url;
}

const get = async (path, params = false) => {
  let url = `${BASE_URL}${path}`;

  if (params) {
    const queryParams = new URLSearchParams(params);
    url += `?${queryParams.toString()}`;
  }

  const response = await fetch(url);

  const headers = [];
  for (const [key, value] of response.headers.entries()) {
    headers[key] = value;
  }

  return {
    data: await response.json(),
    headers,
  };
};

export { get };
