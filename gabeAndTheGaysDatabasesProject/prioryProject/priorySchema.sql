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
  cellNo TEXT CHECK (length(cellNo) == 10), --format needed
  pwd TEXT, --password
  admin INTEGER   -- 1 if true, 0 if false
);

CREATE TABLE equipment (
  equipID INTEGER PRIMARY KEY,
  type TEXT, --what the thing is
  equipRate REAL CHECK (equipRate >= 0) --how much to rent the thing
);

CREATE TABLE equipRes (
  equipID INTEGER,
  pID TEXT,
  dateUsed TEXT,    -- need to specify "YYYY-MM-DD" format ??
  timeIn TEXT CHECK(GLOB('HH:MM', timeIn)),    -- need to specify "HH:MM" format ??
  timeOut TEXT CHECK(GLOB('HH:MM', timeOut)),    -- need to specify "HH:MM" format ??
  FOREIGN KEY (equipID) REFERENCES equipment(equipID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (pID) REFERENCES login(pID)ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (equipID, dateUsed, timeIn)
);

CREATE TABLE bedroom (
  bedID TEXT PRIMARY KEY,
  maxPpl INTEGER CHECK(maxPpl >= 0),
  roomRate REAL CHECK(roomRate >= 0) -- how much to rent
);

CREATE TABLE bedRes (
  pID TEXT,
  bedID TEXT,
  numPpl INTEGER CHECK(bedRes(numPpl) <= bedroom(maxPpl)) CHECK (numPpl >= 0), --check numppl is less than max in room
  checkIn TEXT TEXT CHECK(GLOB('YYYY-MM-DD', checkIn)),   -- need to specify "YYYY-MM-DD" format ??
  checkOut TEXT CHECK(GLOB('YYYY-MM-DD', checkOut)),   -- need to specify "YYYY-MM-DD" format ??
  dateRecvd TEXT CHECK(GLOB('YYYY-MM-DD', dateRecvd)),
  FOREIGN KEY (pID) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (bedID) REFERENCES bedroom(bedID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (bedID, checkIn)
);

CREATE TABLE meetRoom (
  roomID TEXT PRIMARY KEY,
  maxPpl INTEGER CHECK (maxPpl >= 0),
  meetRate REAL CHECK (meetRate >= 0) --how much to rent the room
);

CREATE TABLE meetRes (
  roomID TEXT,
  pID TEXT,
  numPpl INTEGER CHECK(meetRes(numPpl) <= meetRoom(maxPpl)), --check peple thing
  dateUsed TEXT CHECK(GLOB('YYYY-MM-DD', dateUsed)),    -- need to specify "YYYY-MM-DD" format ??
  timeIn TEXT CHECK(GLOB('HH:MM', timeIn)),    -- need to specify "HH:MM" format ??
  timeOut TEXT CHECK(GLOB('HH:MM', timeOut)),    -- need to specify "HH:MM" format ??
  dateRecvd TEXT CHECK(GLOB('YYYY-MM-DD', dateRecvd)),
  FOREIGN KEY (roomID) REFERENCES meetRoom(roomID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (pID) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (roomID, dateUsed, timeIn)
);

CREATE TABLE program (
  programName TEXT,
  contact INTEGER, --person in charge
  roomID TEXT, --room they are in (might be more that one?)
  cost REAL CHECK (cost >= 0),
  dateUsed TEXT,
  timeIn TEXT CHECK(GLOB('HH:MM', timeIn)),    -- need to specify "HH:MM" format ??
  timeOut TEXT CHECK(GLOB('HH:MM', timeOut)),    -- need to specify "HH:MM" format ??
  FOREIGN KEY (contact) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (roomID) REFERENCES meetRoom(roomID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (programName, contact, dateUsed, timeIn)
);

CREATE TABLE programRoster ( --think onboard table
  programName TEXT, --what they are attending
  pID TEXT, --person attending program
  dateRecvd TEXT CHECK(GLOB('YYYY-MM-DD', dateRecvd)),
  FOREIGN KEY (programName) REFERENCES program(programName) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (pID) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (programName, pID)
);
