# GetProducts

Endpoint: `/api/product/`

Allowed methods: `GET`

## Query Parameters

### `searchString`
### `manufacturerBy`
### `catalogueBy`
### `categoryBy`

Every product can have one or more category IDs in its value under `$product['categories']: string[]`.
With this parameter you only get products that are in the specified categories or in child categories of them.

Split multiple category IDs with a `~` like in this example:

```text
.../api/product/?categoryBy=28~35&categoryOption=just
```

### `categoryOption`

This parameter only can be used with the [categoryBy](#categoryby) parameter.

For now there is only the option `just`. With `just` you will get products that are exactly in the categories provided by `categoryBy`.

Use it like this:

```text
.../api/product/?categoryBy=28~35&categoryOption=just
```

### `priceTo`
### `priceFrom`
### `dateFrom`
### `currentPage`
### `sortBy`
### `sortDirection`
### `limit`
