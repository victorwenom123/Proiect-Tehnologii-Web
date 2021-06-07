

create table comments
(
    id   int           not null
        primary key,
    name varchar(1000) null
);



create table genres
(
    id   int         not null
        primary key,
    name varchar(30) null
);



create table locations
(
    id   int          not null
        primary key,
    name varchar(500) null
);

create table moods
(
    id   int          not null
        primary key,
    name varchar(500) null
);




create table songgenres
(
    id   int           not null
        primary key,
    name varchar(1000) null
);

create table songs
(
    id             int           not null
        primary key,
    description    varchar(1000) null,
    name           varchar(100)  null,
    length         int           null,
    author         varchar(100)  null,
    tagId          int           null,
    commentId      int           null,
    genreId        int           null,
    date           date          null,
    ageInterval    varchar(100)  null,
    educationLevel varchar(100)  null,
    zoneType       varchar(100)  null,
    goodForGroups  varchar(100)  null,
    locationId     int           null,
    moodId         int           null,
    habitatType    varchar(100)  null
);

create table commentlinking
(
    idSong    int not null,
    idComment int not null,
    primary key (idSong, idComment),
    constraint commentLinking_comments_id_fk
        foreign key (idComment) references comments (id),
    constraint commentLinking_songs_id_fk
        foreign key (idSong) references songs (id)
);

create table genrelinking
(
    idSong  int not null,
    idGenre int not null,
    primary key (idSong, idGenre),
    constraint genreLinking_songgenres_id_fk
        foreign key (idGenre) references songgenres (id),
    constraint genreLinking_songs_id_fk
        foreign key (idSong) references songs (id)
);

create table locationlinking
(
    songId     int not null,
    locationId int not null,
    primary key (songId, locationId),
    constraint locationLinking_locations_id_fk
        foreign key (locationId) references locations (id),
    constraint locationLinking_songs_id_fk
        foreign key (songId) references songs (id)
);

create table moodlinking
(
    idSong int not null,
    idMood int not null,
    primary key (idSong, idMood),
    constraint moodLinking_moods_id_fk
        foreign key (idMood) references moods (id),
    constraint moodLinking_songs_id_fk
        foreign key (idSong) references songs (id)
);

create table tags
(
    id   int          not null
        primary key,
    name varchar(500) null
);

create table taglinking
(
    idSong int null,
    idTag  int null,
    constraint tagLinking_pk
        unique (idSong, idTag),
    constraint tagLinking_songs_id_fk
        foreign key (idSong) references songs (id),
    constraint tagLinking_tags_id_fk
        foreign key (idTag) references tags (id)
);

create table users
(
    id       int          not null
        primary key,
    name     varchar(100) null,
    password varchar(100) null,
    email    varchar(100) null
);