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

alter table Reviews add foreign key (book_id) references Books(id)
