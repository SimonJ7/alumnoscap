/*alter database alumnosdb set time zone 'America/La_Paz';

create extension if not exists pgcrypto;

create extension if not exists "uuid-ossp";*/


create table users
(
  id uuid not null unique primary key default uuid_generate_v4(),

  firstname varchar(30),
  lastname varchar(30),
  name varchar(30) not null,

  birth_country varchar(60) not null,
  birth_department varchar(60) not null,
  birth_province varchar(60) not null,
  birth_locality varchar(60) not null,

  ci varchar(30) not null unique,

  birthdate date not null,

  civil_status varchar(30) not null,

  gender varchar(30) not null,

  address_department varchar(60) not null,
  address_province varchar(60) not null,
  address_municipality varchar(60) not null,
  address_locality varchar(60) not null,
  address_zone varchar(60) not null,
  address_street varchar(60) not null,
  address_number varchar(60) not null,
  telephone varchar(30) not null,
  cellphone varchar(30) not null unique,

  reference_name varchar(120) not null,
  reference_cellphone varchar(30) not null,

  latitude varchar(30) not null,
  longitude varchar(30) not null,

  district integer not null,
  sons integer not null,

  created_at timestamp not null default CURRENT_TIMESTAMP,
  updated_at timestamp not null default CURRENT_TIMESTAMP,
  state boolean not null default true
);



create table courses
(
  id uuid not null unique primary key default uuid_generate_v4(),

  name varchar(150) not null,
  level integer not null,
  center varchar(150) not null,
  type varchar(60) not null,

  created_at timestamp not null default CURRENT_TIMESTAMP,
  updated_at timestamp not null default CURRENT_TIMESTAMP,
  state boolean not null default true
);

create table users_courses
(
  id_user uuid not null,
  id_course uuid not null,
  foreign key (id_user) references users(id)
		on update cascade
		on delete cascade,
  foreign key (id_course) references courses(id)
		on update cascade
		on delete cascade,
  primary key (id_user, id_course)
);
