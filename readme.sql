drop table Authors;
create table Authors (
                         id int auto_increment primary key ,
                         name varchar(255),
                         info varchar(500)
);

drop table genres;

create table Genres(
                       id int auto_increment primary key ,
                       name varchar(255)

);

drop table Publishers;

create table Publishers(
                           id int auto_increment primary key ,
                           name varchar(255)

);

drop table Reviews;

create table Reviews(
                        id int auto_increment primary key ,
                        content varchar(1000),
                        book_id int

);

drop table Books;

create table Books(
                      id int auto_increment primary key ,
                      name varchar(255),
                      quantity int not null,
                      genre_id int not null ,
                      author_id int not null ,
                      review_id int not null ,
                      publisher_id int not null ,
                      foreign key (genre_id) references Genres(id),
                      foreign key (author_id) references Authors(id),
                      foreign key (review_id) references Reviews(id),
                      foreign key (publisher_id) references Publishers(id)

);

drop table Roles;

create table Roles(
                      id int primary key auto_increment,
                      name varchar(255)
);
drop table Users;
create table Users (
                       id int auto_increment primary key ,
                       username varchar(255),
                       password varchar(255),
                       role_id int not null ,
                       foreign key (role_id) references Roles(id)
);



