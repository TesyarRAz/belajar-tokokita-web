create table member (
    id int not null auto_increment,
    nama varchar(255) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    primary key(id)
);

create table member_token (
    id int not null auto_increment,
    member_id int not null,
    auth_key varchar(255) not null,
    foreign key(member_id) references member(id) on update cascade on delete no action,
    primary key(id)
);

create table produk (
    id int not null auto_increment,
    kode_produk varchar(255) not null,
    nama_produk varchar(255) not null,
    harga int not null,
    primary key(id)
);