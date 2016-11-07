.mode columns
.headers on
.nullvalue NULL
PRAGMA foreign_keys = ON;

CREATE TABLE login (
  pID INTEGER PRIMARY KEY,
  f_name TEXT NOT NULL,
  l_name TEXT NOT NULL,
  address TEXT,
  email TEXT NOT NULL,
  cellNo INTEGER,
  pwd TEXT,
  admin INTEGER   -- 1 if true, 0 if false
)

CREATE TABLE equipment (
  pID TEXT,
  equipID INTEGER PRIMARY KEY,
  equipRate REAL,
  FOREIGN KEY (pID) REFERENCES login(pID)   -- need on update/delete
)

CREATE TABLE equipRes (
  pID TEXT,
  equipID INTEGER,
  dateUsed TEXT,    -- need to specify "YYYY-MM-DD" format ??
  timeIn TEXT,    -- need to specify "HH:MM" format ??
  timeOut TEXT,    -- need to specify "HH:MM" format ??
  FOREIGN KEY (equipID) REFERENCES equipment(equipID), -- need on update/delete
  FOREIGN KEY (pID) REFERENCES login(pID),   -- need on update/delete
  PRIMARY KEY (equipID, dateUsed, timeIn)
)

CREATE TABLE bedrooms (
  bedID TEXT PRIMARY KEY,    -- might be integer room num ??
  maxPpl INTEGER,
  roomRate REAL
)

CREATE TABLE roomRes (
  pID TEXT,
  bedID TEXT,   -- might be integer room num ??
  numPpl INTEGER,
  checkInDate TEXT,   -- need to specify "YYYY-MM-DD" format ??
  checkOutDate TEXT,   -- need to specify "YYYY-MM-DD" format ??
  FOREIGN KEY (pID) REFERENCES login(pID),   -- need on update/delete
  FOREIGN KEY (bedID) REFERENCES bedrooms(bedID),  -- need on update/delete
  PRIMARY KEY (pID, bedID, checkInDate)
)

CREATE TABLE meetingRoom (
  roomID TEXT PRIMARY KEY,   -- might be integer room num ??
  maxPpl INTEGER,
  meetRate REAL
)

CREATE TABLE meetingRoomRes (
  roomID TEXT,  -- might be integer room num ??
  pID TEXT,
  numPpl INTEGER,
  dateUsed TEXT,    -- need to specify "YYYY-MM-DD" format ??
  timeIn TEXT,    -- need to specify "HH:MM" format ??
  timeOut TEXT,    -- need to specify "HH:MM" format ??
  FOREIGN KEY (roomID) REFERENCES meetingRoom(roomID),
  FOREIGN KEY (pID) REFERENCES login(pID),   -- need on update/delete
  PRIMARY KEY (roomID, pID, dateUsed, timeIn)
)
