CREATE OR REPLACE VIEW itemsview AS
SELECT items.*,categories.* FROM items
INNER JOIN categories ON items.items_cat=categories.categories_id;





CREATE OR REPLACE VIEW myfavorite
SELECT favorite.*,items.*,users.users_id FROM favorite
INNER JOIN items ON favorite.favorite_itemsid=items.items_id
INNER JOIN users ON favorite.favorite_usersid=users.users_id


CREATE or REPLACE VIEW cartview as 
SELECT SUM(items.items_price - (items.items_price*items.items_discount/100)) as itemsprice , COUNT(cart.cart_itemsid) as countitems , cart.* , items.* FROM cart
INNER JOIN items ON items.items_id = cart.cart_itemsid
where cart_ordres=0
GROUP BY cart.cart_itemsid , cart.cart_usersid;