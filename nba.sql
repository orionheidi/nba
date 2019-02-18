create database nba;
use nba;
select * from teams;
explain players;
insert into teams(name,email,address,city,created_at,updated_at) values('SuperStar','superstar@gmail.com','Prizrenska 2','Novi Sad',Now(),Now());
insert into teams(name,email,address,city,created_at,updated_at) values('Gorstaci','gorstaci@gmail.com','Kosmajska 2','Beograd',Now(),Now());
insert into teams(name,email,address,city,created_at,updated_at) values('Tupadzije','tupadzije@gmail.com','Drezdenska 2','Zrenjanin',Now(),Now());

insert into players(first_name,last_name,email,city,team_id,created_at,updated_at) values('Micko','Patrnuzic','mico@gmail.com','Novi Sad',1,Now(),Now());
insert into players(first_name,last_name,email,city,team_id,created_at,updated_at) values('Dacko','Daconi','dacko@gmail.com','Beograd',2,Now(),Now());
insert into players(first_name,last_name,email,city,team_id,created_at,updated_at) values('Lale','Lepi','lepi@gmail.com','Zrenjanin',3,Now(),Now());
