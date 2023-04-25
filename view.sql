CREATE OR REPLACE VIEW itemsview AS
SELECT items.*,categories.* FROM items
INNER JOIN categories ON items.items_cat=categories.categories_id;





CREATE OR REPLACE VIEW myfavorite
SELECT favorite.*,items.*,users.users_id FROM favorite
INNER JOIN items ON favorite.favorite_itemsid=items.items_id
INNER JOIN users ON favorite.favorite_usersid=users.users_id