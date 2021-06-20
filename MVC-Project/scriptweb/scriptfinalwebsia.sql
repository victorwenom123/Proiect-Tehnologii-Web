




create table songs
(
    id             int           not null
        primary key,
    description    varchar(1000) null,
    name           varchar(100)  null,
    length         int           null,
    author         varchar(100)  null,
    genre          varchar(100)  null,
    date           date          null,
    age            varchar(100)  null,
    educationLevel varchar(100)  null,
    zoneType       varchar(100)  null,
    goodForGroups  varchar(100)  null,
    mood           varchar(100)  null,
    habitatType    varchar(100)  null,
    youtubeLink    varchar(200)	 null
);

create table commentlinking
(   commentName varchar(1000) null,
    idSong    int not null,
    idComment int not null,
    primary key (idSong, idComment),
    constraint commentLinking_songs_id_fk
        foreign key (idSong) references songs (id)
);


create table locationlinking
(   locationName varchar(500) null,
    songId     int not null,
    locationId int not null,
    primary key (songId, locationId),
    constraint locationLinking_songs_id_fk
        foreign key (songId) references songs (id)
);





create table taglinking
(   tagName varchar(500) null,
    idSong int null,
    idTag  int null,
    constraint tagLinking_pk
        unique (idSong, idTag),
    constraint tagLinking_songs_id_fk
        foreign key (idSong) references songs (id)
);

create table users
(
    id       int          not null
        primary key,
    name     varchar(100) null,
    password varchar(100) null,
    email    varchar(100) null
);