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
  cellNo INTEGER, --format needed
  pwd TEXT, --password
  admin INTEGER   -- 1 if true, 0 if false
)

CREATE TABLE equipment (
  equipID INTEGER PRIMARY KEY,
  type TEXT, --what the thing is
  equipRate REAL --how much to rent the thing
)

CREATE TABLE equipRes (
  equipID INTEGER,
  pID TEXT,
  date TEXT,    -- need to specify "YYYY-MM-DD" format ??
  timeIn TEXT,    -- need to specify "HH:MM" format ??
  timeOut TEXT,    -- need to specify "HH:MM" format ??
  FOREIGN KEY (equipID) REFERENCES equipment(equipID) ON DELETE CASCADE ON UPDATE CASCADE, 
  FOREIGN KEY (pID) REFERENCES login(pID)ON DELETE CASCADE ON UPDATE CASCADE, 
  PRIMARY KEY (equipID, date, timeIn)
)

CREATE TABLE bedroom (
  bedID TEXT PRIMARY KEY,
  maxPpl INTEGER,
  roomRate REAL -- how much to rent
)

CREATE TABLE bedRes (
  pID TEXT,
  bedID TEXT,   
  numPpl INTEGER CHECK(bedRes(numPpl) <= bedroom(maxPpl)), --check numppl is less than max in room
  checkIn TEXT,   -- need to specify "YYYY-MM-DD" format ??
  checkOut TEXT,   -- need to specify "YYYY-MM-DD" format ??
  FOREIGN KEY (pID) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE, 
  FOREIGN KEY (bedID) REFERENCES bedroom(bedID) ON DELETE CASCADE ON UPDATE CASCADE, 
  PRIMARY KEY (bedID, checkIn)
)

CREATE TABLE meetRoom (
  roomID TEXT PRIMARY KEY, 
  maxPpl INTEGER,
  meetRate REAL --how much to rent the room
)

CREATE TABLE meetRes (
  roomID TEXT, 
  pID TEXT,
  numPpl INTEGER CHECK(meetRes(numPpl) <= meetRoom(maxPpl)), --check peple thing
  dateUsed TEXT,    -- need to specify "YYYY-MM-DD" format ??
  timeIn TEXT,    -- need to specify "HH:MM" format ??
  timeOut TEXT,    -- need to specify "HH:MM" format ??
  FOREIGN KEY (roomID) REFERENCES meetRoom(roomID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (pID) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE,  
  PRIMARY KEY (roomID, dateUsed, timeIn)
)

CREATE TABLE program (
  programName TEXT,
  contact INTEGER, --person in charge
  roomID TEXT, --room they are in (might be more that one?)
  cost REAL,
  date TEXT,
  timeIn TEXT,    -- need to specify "HH:MM" format ??
  timeOut TEXT,    -- need to specify "HH:MM" format ??
  FOREIGN KEY (contact) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (roomID) REFERENCES meetRoom(roomID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (programName, contact, date, timeIn) 
)

CREATE TABLE programRoster ( --think onboard table
  programName TEXT, --what they are attending
  pID, --person attending program
  FOREIGN KEY (programName) REFERENCES program(programName) ON DELETE CASCADE ON UPDATE CASCADE,  
  FOREIGN KEY (pID) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE,  
  PRIMARY KEY (programName, pID)
)
