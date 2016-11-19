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
  extraNeeds TEXT,
  admin INTEGER   -- 1 if true, 0 if false
);

CREATE TABLE equipment (
  equipID INTEGER PRIMARY KEY,
  type TEXT, --what the thing is
  equipRate REAL CHECK (equipRate >= 0), --how much to rent the thing for - hourly rate?
  notes TEXT
);

CREATE TABLE equipRes (
  equipResID INTEGER PRIMARY KEY,
  roomReq INTEGER,  -- 1 if room is required
  equipID INTEGER,
  dateUsed TEXT CHECK(GLOB('????-??-??', dateUsed)),
  timeIn TEXT CHECK(GLOB('??:??', timeIn)),
  timeOut TEXT CHECK(GLOB('??:??', timeOut)),
  FOREIGN KEY (equipID) REFERENCES equipment(equipID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE bedroom (
  bedID TEXT PRIMARY KEY,
  maxPpl INTEGER CHECK(maxPpl >= 0),
  roomRate REAL CHECK(roomRate >= 0) -- how much to rent a room for - rate per day?
);

CREATE TABLE bedRes (
  bedResID INTEGER PRIMARY KEY,
  bedID TEXT,
  numPpl INTEGER CHECK (numPpl >= 0),
  --  CHECK (bedRes(numPpl) <= bedroom(maxPpl)), -- check numppl is less than max in room - do this in html??
  checkIn TEXT CHECK(GLOB('????-??-??', checkIn)),
  checkOut TEXT CHECK(GLOB('????-??-??', checkOut)),
  timeIn TEXT CHECK(GLOB('??:??', timeIn)),
  timeOut TEXT CHECK(GLOB('??:??', timeOut)),
  dateRecvd TEXT CHECK(GLOB('????-??-??', dateRecvd)),
  FOREIGN KEY (bedID) REFERENCES bedroom(bedID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE meetRoom (
  roomID TEXT PRIMARY KEY,
  maxPpl INTEGER CHECK (maxPpl >= 0),
  dayMeetRate REAL CHECK (dayMeetRate >= 0), --how much to rent the room for - hourly rate??
  eveningMeetRate REAL CHECK (eveningMeetRate >= 0)
);

CREATE TABLE meetRes (
  meetResID INTEGER PRIMARY KEY,
  roomID TEXT,
  numPpl INTEGER CHECK (numPpl >= 0),
  -- CHECK(meetRes(numPpl) <= meetRoom(maxPpl)), --check peple thing
  dateUsed TEXT CHECK(GLOB('????-??-??', dateUsed)),
  timeIn TEXT CHECK(GLOB('??:??', timeIn)),
  timeOut TEXT CHECK(GLOB('??:??', timeOut)),
  dateRecvd TEXT CHECK(GLOB('????-??-??', dateRecvd)),
  FOREIGN KEY (roomID) REFERENCES meetRoom(roomID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE groupInfo (
  groupID INTEGER PRIMARY KEY,
  contactPerson INTEGER,
  groupName TEXT,
  groupNeeds TEXT,
  tour INTEGER,
  FOREIGN KEY (contactPerson) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE dayVisit (
  pID INTEGER,
  day TEXT CHECK(GLOB('????-??-??', day)),
  tour INTEGER,
  FOREIGN KEY (pID) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (pID, day)
);

CREATE TABLE nightVisit (
  pID INTEGER,
  day TEXT CHECK(GLOB('????-??-??', day)),
  bedResID INTEGER,
  FOREIGN KEY (bedResID) REFERENCES bedRes(bedResID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (pID, day)
);

CREATE TABLE groupRooms (
  groupID INTEGER,
  meetResID INTEGER,
  FOREIGN KEY (groupID) REFERENCES groupInfo(groupID)  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (meetResID) REFERENCES meetRes(meetResID)  ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (groupID, meetResID)
);

CREATE TABLE prioryEvent (
  eventID INTEGER PRIMARY KEY,
  startDate TEXT,
  endDate TEXT,
  name TEXT,
  description TEXT
);

CREATE TABLE eventRoom (
  eventID INTEGER,
  meetResID INTEGER,
  FOREIGN KEY (eventID) REFERENCES prioryEvent(eventID)  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (meetResID) REFERENCES meetRes(meetResID)  ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (eventID, meetResID)
);

CREATE TABLE eventRoster (
  eventID INTEGER,
  pID INTEGER,
  numPpl INTEGER,
  FOREIGN KEY (eventID) REFERENCES prioryEvent(eventID)  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (pID) REFERENCES login(pID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (eventID, pID)
);

CREATE TABLE groupOvernight (
  overnightID INTEGER PRIMARY KEY,
  groupID INTEGER,
  FOREIGN KEY (groupID) REFERENCES groupInfo(groupID)  ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE overnightBeds (
  overnightID INTEGER,
  bedResID INTEGER,
  FOREIGN KEY (overnightID) REFERENCES groupOvernight(overnightID)  ON DELETE CASCADE ON UPDATE CASCADE
  FOREIGN KEY (bedResID) REFERENCES bedRes(bedResID)  ON DELETE CASCADE ON UPDATE CASCADE
);
