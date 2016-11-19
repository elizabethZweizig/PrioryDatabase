-- example data to test the database

insert into login values (1, 'priory', 'admin', 'priory addr', 'a@b.c', '1111111111', 'password', 'extra stuff', 1);
insert into login values (2, 'normal', 'user', 'user addr', 'a@b.c', '1112223333', 'password2', 'some stuff', 0);

insert into equipment values (1, 'equip1', 10.5, 'notes');

insert into equipRes values (1, 1, 1, '2016-05-10', '10:00', '04:00');

insert into bedroom values ('bed1', 8, 20.5);

insert into bedRes values (1, 'bed1', 4, '2016-08-10', '2016-08-12', '08:00', '06:00', '2016-08-02');

insert into meetRoom values ('meet1', 25, '50.25', '10.5');

insert into meetRes values (1, 'meet1', 8, '2016-08-11', '04:00', '06:00', '2016-08-02');

insert into dayVisit values (2, '2016-08-10', 1);

insert into nightVisit values (2, '2016-07-15', 1);

insert into prioryEvent values (1, '2016-02-04', '2016-02-05', 'event1', 'description of event1');

insert into eventRoom values (1, 1);

insert into eventRoster values (1, 2, 5);

insert into overnightBeds values (1, 1);

insert into groupInfo values (1, 2, 'group1', 'extra needs', 0);

insert into groupRooms values (1, 1);

insert into groupOvernight values (1, 1);
