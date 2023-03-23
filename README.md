To Run the project follow one time process
    Create database and configure in .env file.
    Run "composer install"
        "php artisan migrate"
        "php artisan storage:link"
        "php artisan db:seed"
        

Requests
1. GET 
   /api/items
   -
   To fetch all categories with items group by categories.

2. GET 
   /api/current-avatar
   -
   To fetch all current avatar of current user.

3. POST
   /api/buy-item
   item:(required, ITEM_ID)
   To buy item

4. POST
   /api/change-avatar
   items:(required, array, ITEM_IDs)
   To change current avatar
    
