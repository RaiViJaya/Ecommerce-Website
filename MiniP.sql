-- users
create table if not exists users(
    id int(10) auto_increment primary key,
    username varchar(120) not null,
    email varchar(120) not null,
    password varchar(120) not null,
    user_type ENUM("user", "admin") default "user",
    profile varchar(255) default 'profile.jpg'
);

-- user_details
create table if not exists user_details(
    id int(10) auto_increment primary key,
    user_id int(10) not null,
    country varchar(120) default null,
    state varchar(120) default null,
    district varchar(120) default null,
    pincode varchar(120) default null,
    mobile varchar(15) default null,
    local_address varchar(255) default null,
    permanent_addess varchar(255) default null,
    foreign key(user_id) references users(id)
);


-- product_categories
create table if not exists product_categories(
    id int(10) auto_increment primary key,
    name varchar(255) not null,
    image varchar(255) not null,
    status ENUM("not_active","active") default "not_active"
);

-- products
create table if not exists products(
    id int(10) auto_increment primary key,
    name varchar(255) not null,
    price double(8,2) not null,
    sale_price double(8,2) not null,
    qty double(8,2) not null,
    details text default null,
    image varchar(120) not null
);

-- product_ratings
create table if not exists product_ratings(
    id int(10) auto_increment primary key,
    user_id int(10) not null,
    product_id int(10) not null,
    rate enum("1","2","3","4","5") default "1",
    foreign key(user_id) references users(id),
    foreign key(product_id) references products(id)
);

-- product_reviews
create table if not exists product_reviews(
    id int(10) auto_increment primary key,
    user_id int(10) not null,
    product_id int(10) not null,
    review varchar(255) not null,
    foreign key(user_id) references users(id),
    foreign key(product_id) references products(id)
);

-- product_carts
create table if not exists product_carts(
    id int(10) auto_increment primary key,
    user_id int(10) not null,
    product_id int(10) not null,
    qty double(8,2) not null,
    foreign key(user_id) references users(id),
    foreign key(product_id) references products(id)
);

-- payment_request_details
create table if not exists payment_request_details(
    id int(10) auto_increment primary key,
    phone varchar(15) not null,
    buyer_name varchar(120) not null,
    amount double(8,2) not null,
    purpose varchar(120) not null,
    payment_request_status varchar(120) not null,
    payment_id varchar(120) default null,
    payment_status varchar(120) default null
);

-- order_payments
create table if not exists order_payments(
    id int(10) auto_increment primary key,
    payment_request_detail_id int(10) not null,
    foreign key(payment_request_detail_id) references payment_request_details(id)
);

-- product_orders
create table if not exists product_orders(
    id int(10) auto_increment primary key,
    payment_id int(10) not null,
    foreign key(payment_id) references order_payments(id)
);

-- product_order_details
create table if not exists product_order_details(
    id int(10) auto_increment primary key,
    order_id int(10) not null,
    product_id int(10) not null,
    user_id int(10) not null,
    qty double(8,2) not null,
    foreign key(order_id) references product_orders(id)
);




