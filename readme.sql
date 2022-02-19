create table Authors(
                        id int primary key auto_increment,
                        name varchar(255),
                        info varchar(255),
);

create table Genre(
                      id int primary key auto_increment,
                      name varchar(255)
);

create table Reviews(
                        id int primary key auto_increment,
                        content varchar(1000),
                        book_id int
);

create table Books(
                      id int primary key auto_increment,
                      name varchar(1000),
                      quantity int not null,
                      genre_id int not null ,
                      author_id int not null,
                      review_id int not null,
                      foreign key (genre_id) references Genre(id),
                      foreign key (author_id) references Authors(id),
                      foreign key (review_id) references Reviews(id)
);

alter table Reviews add foreign key (book_id) references Books(id);

create table Publishers(
                           id int auto_increment primary key,
                           name varchar(255)
);
alter table Books add Publisher_id int;
alter table  add foreign key (Publisher_id) references Books(id);

CREATE TABLE Roles(
                      id int PRIMARY KEY AUTO_INCREMENT,
                      name varchar(255)
);
<<<<<<< HEAD

CREATE  table Users(
    id int primary key AUTO_INCREMENT,
    Student_code int not null,
    Role_id int not null
);
=======
alter table Books
    add foreign key (rublisher_id) references Publishers(id);
>>>>>>> 7b341a9697f81d5723ff837daf79613f1a616c71

alter table Books add constraint foreign key (genre_id) references genres(id);
