CREATE OR REPLACE VIEW itemsview AS
SELECT items.*,categories.* FROM items
INNER JOIN categories ON items.items_cat=categories.categories_id;





CREATE OR REPLACE VIEW myfavorite as
SELECT favorite.*,items.*,users.users_id,items.items_price -(items.items_price*(items.items_discount/100)) as itemspricediscount FROM favorite
INNER JOIN items ON favorite.favorite_itemsid=items.items_id
INNER JOIN users ON favorite.favorite_usersid=users.users_id


CREATE or REPLACE VIEW cartview as 
SELECT SUM(items.items_price - (items.items_price*items.items_discount/100)) as itemsprice , COUNT(cart.cart_itemsid) as countitems , cart.* , items.* FROM cart
INNER JOIN items ON items.items_id = cart.cart_itemsid
where cart_ordres=0
GROUP BY cart.cart_itemsid , cart.cart_usersid;

create or replace view ordersview as
select orders.*,address.* from orders 
left join address on orders.orders_address=address.address_id;


-- =============================combined=========================
-- create or replace view ordersview1 as
-- select orders.*,address.* from orders,address
-- where orders.orders_address=address.address_id;


create or replace view ordersdetailsview as 
select count(cart.cart_itemsid) as countitems,sum(items.items_price-items.items_price*items.items_discount/100)as itemsprice ,cart.*,items.* from cart
inner join items on cart.cart_itemsid=items.items_id
where cart_ordres!=0
group by cart.cart_ordres ,cart.cart_itemsid,cart.cart_usersid; 



create or replace view itemstopselling as
select count(cart.cart_id) as countitems,cart.*,items.* from cart
inner join items on items.items_id=cart.cart_itemsid
where cart_ordres!=0
group by cart_itemsid 
order by countitems desc