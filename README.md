# Laravel Product App

## Description
Brief overview of the project.

## Table of Contents
1. [Tables Structure](#tables-structure)
2. [Description of User and CRUD Operations](#description-of-user-and-crud-operations)
3. [Details about CRUD Operations for Products and Categories](#details-about-crud-operations-for-products-and-categories)
4. [Models: Category and Product](#models-category-and-product)
5. [Routes](#routes)
6. [Views Structure](#views-structure)
7. [Migrations](#migrations)
8. [Factories](#factories)
9. [Database Seeding](#database-seeding)
10. [Search Functionality](#search-functionality)
11. [Sorting Products and Categories by Name](#sorting-products-and-categories-by-name)

## Tables Structure
### Users
- Default Laravel Backpack generated table.

### Products
- **Columns**:
  - id
  - name
  - description
  - image
  - created_at
  - updated_at

### Categories
- **Columns**:
  - id
  - name
  - created_at
  - updated_at
- **Relationship**:
  - One-to-many with Products (one category has many products).

## Description of User and CRUD Operations
Information based on the default Laravel Backpack user CRUD.

## Details about CRUD Operations for Products and Categories
### ProductController
- **Index**:
  - Displays products, sorted by latest creation.
- **Search**:
  - Filters products based on search query.

### CategoryController
- **Index**:
  - Displays all categories.
- **Search**:
  - Filters categories based on search query.

## Models: Category and Product
### Category Model
- **Relationships**:
  - Has many products
  - Scope for search

### Product Model
- **Image Handling**:
  - Logic for image upload, deletion, and storage.
- **Relationships**:
  - Belongs to a category
  - Scope for search

## Routes
### Categories
- `/categories`: Category index page.

### Products
- `/products`: Product index page.

## Views Structure
### Categories
- Index

### Layouts
- Nav
- Master
- Footer

### Partials
- Image

### Products
- Index

### Index
- Home page.

## Migrations
- `2023_12_20_202331_create_products_table`: Creates the initial products table.
- `2023_12_20_202454_create_categories_table`: Creates the initial categories table.
- `2024_01_07_230716_add_columns_to_categories_table`: Adds columns to the categories table: name.
- `2024_01_07_231629_add_columns_to_products_table`: Adds columns to the products table: name, category_id, description, image.

## Factories

### Category Factory

The `CategoryFactory` generates default instances for the Category model. It includes a randomly generated word for the name attribute.

### Product Factory

The `ProductFactory` creates default instances for the Product model. It generates data for attributes like name, category, description, and image.

## Database Seeding

To activate the seeders and populate the database, use the following artisan command:

```bash
php artisan db:seed
```

## Search Functionality
### Categories
- Search for categories by category name.

### Products
- Search for products by product name and category.

**Note:** If a user types only '%' or '_', the application will return an empty result to prevent displaying the entire table data.
  
## Sorting Products and Categories by Name

The sorting functionality allows users to organize the data alphabetically based on names.

#### Products Index Page
- Implemented sorting by product names.
- Added a clickable header for the "Product Name" column that triggers the sorting action.
- Utilized Bootstrap and FontAwesome icons for visual indicators.

#### Categories Index Page
- Similar implementation for sorting by category names.

Click on the "Product Name" or "Category Name" header to sort the entries alphabetically.

