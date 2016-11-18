-- example data added to the db currently
insert into login values (null, 'priory', 'admin', 'priory addr', 'a@b.c', '1111111111', 'password', 'extra stuff', 1)
insert into login values (null, 'normal', 'user', 'user addr', 'a@b.c', '1112223333', 'password2', 'some stuff', 0);

insert into equipment values (null, 'equip1', 10.5);
insert into equipRes(1, 2, '2016-05-10', '10:00', '04:00');

insert into bedroom values ('bed1', 8, 20.5);
insert into bedRes values (2, 'bed1', 4, '2016-08-10', '2016-08-12', '08:00', '06:00', '2016-08-02');

insert into meetRoom values ('bed1', 25, '50.25');
insert into meetRes values ('bed1', 2, 8, '2016-08-11', '04:00', '06:00', '2016-08-02');

insert into program values ('program1', 1, 'Sophia', 12.5, '2016-05-10', '05:00', '08:00', 1, "notes");
insert into programRoster values ('program1', 2, 6, '2016-08-12');
