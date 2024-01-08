# laravel-product-app

Brief description to the project.

## Table of Contents

- [Tables Structure](#tables-structure)
- [Description of User and CRUD Operations](#description-of-user-and-crud-operations)
- [Details about CRUD Operations for Products and Categories](#details-about-crud-operations-for-products-and-categories)
- [Models: Category and Product](#models-category-and-product)
- [Routes](#routes)
- [Views Structure](#views-structure)
- [Migrations](#migrations)

## Tables Structure

- **Users**: Default Laravel Backpack generated table.
- **Products**:
  - Columns: id, name, description, image, created_at, updated_at.
- **Categories**:
  - Columns: id, name, created_at, updated_at.
  - Relationship: One-to-many with Products (one category has many products).

## Description of User and CRUD Operations

Information based on the default Laravel Backpack user CRUD.

## Details about CRUD Operations for Products and Categories

- **ProductController**:
  - Index: Displays products, sorted by latest creation.
  - Search: Filters products based on search query.
- **CategoryController**:
  - Index: Displays all categories.
  - Search: Filters categories based on search query.

## Models: Category and Product

- **Category**:
  - Relationships: Has many products, scope for search.
- **Product**:
  - Image Handling: Logic for image upload, deletion, and storage.
  - Relationships: Belongs to a category, scope for search.

## Routes

- **Categories**:
  - /categories: Category index page.
  - /categories/search: Search categories.
- **Products**:
  - /products: Product index page.
  - /products/search: Search products.

## Views Structure

- **Categories**:
  - Index, Search.
- **Layouts**:
  - Nav, Master, Footer.
- **Partials**:
  - Image.
- **Products**:
  - Index, Search.
- **Index**: Home page.

## Migrations

- **Migrations**:
  - `2023_12_20_202331_create_products_table`: Creates the initial products table.
  - `2023_12_20_202454_create_categories_table`: Creates the initial categories table.
  - `2024_01_07_230716_add_columns_to_categories_table`: Adds columns to the categories table: name.
  - `2024_01_07_231629_add_columns_to_products_table`: Adds columns to the products table: name, category_id, description, image.


