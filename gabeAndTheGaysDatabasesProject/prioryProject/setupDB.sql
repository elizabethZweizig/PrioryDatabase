-- set up admin account
insert into login values (1, 'priory', 'admin', 'priory address', 'priory@priory.priory', '1112223333', 'admin', 'pwd', 1);

-- set up equipment
insert into equipment values (null, 'flip chart easel', 10, 'need own paper and markers');
insert into equipment values (null, 'chalkboard', 10, 'in MultiPurpose room');
insert into equipment values (null, 'microphone', 10, 'use in full MultiPurpose room only');
insert into equipment values (null, 'podium', 10, '');
insert into equipment values (null, 'extension cord', 10, '');
insert into equipment values (null, 'overhead projector', 10, 'daily fee for Sophia or Guadalupe only');
insert into equipment values (null, 'TV/VCR/DVD', 10, 'daily fee for Sophia or Guadalupe only');

-- set up bedrooms
insert into bedroom values ('Leoba', 2, 50);
insert into bedroom values ('Hilda', 2, 50);
insert into bedroom values ('Hildegard', 2, 50);
insert into bedroom values ('Gertrude', 2, 50);
insert into bedroom values ('Mechtild', 2, 50);
insert into bedroom values ('Hadewijch', 2, 50);
insert into bedroom values ('Heloise', 2, 50);
insert into bedroom values ('Hrotsvit', 2, 50);
insert into bedroom values ('Scholastica', 2, 50);
insert into bedroom values ('Benedicta', 2, 50);

-- set up meeting rooms
insert into meetRoom values('Sophia Room', 20, 65, 20);
insert into meetRoom values('Guadalupe Room', 8, 20, 10);
insert into meetRoom values('Kitchen', 8, 15, 15);
insert into meetRoom values('MultiPurpose Room 1', 70, 130, 130);
insert into meetRoom values('MultiPurpose Room 2', 70, 130, 130);
insert into meetRoom values('MultiPurpose Room 1 and 2', 150, 260, 260);
