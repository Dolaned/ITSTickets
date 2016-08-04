CREATE TABLE IF NOT EXISTS tbl_user_info
(
  id INT PRIMARY KEY,
  firstname VARCHAR(30),
  lastname VARCHAR(30),
  email VARCHAR(50),
  contactnumber VARCHAR(30)
);
CREATE UNIQUE INDEX tbl_user_info_id_uindex ON tbl_user_info (id);

CREATE TABLE IF NOT EXISTS tbl_tickets
(
  ticketid INT PRIMARY KEY NOT NULL,
  os VARCHAR(300),
  softwareissue VARCHAR(300),
  otherissue VARCHAR(300),
  userid INT,
  CONSTRAINT tbl_tickets_tbl_user_info_id_fk FOREIGN KEY (userid) REFERENCES tbl_user_info (id)
);
CREATE UNIQUE INDEX tbl_tickets_ticketid_uindex ON tbl_tickets (ticketid);

CREATE TABLE tbl_comments
(
  id INT PRIMARY KEY NOT NULL,
  ticketid INT,
  comment VARCHAR(500),
  userid INT,
  datetime DATETIME,
  CONSTRAINT tbl_comments_tbl_user_info_id_fk FOREIGN KEY (userid) REFERENCES tbl_user_info (id),
  CONSTRAINT tbl_comments_tbl_tickets_ticketid_fk FOREIGN KEY (ticketid) REFERENCES tbl_tickets (ticketid)
);
CREATE UNIQUE INDEX tbl_comments_id_uindex ON tbl_comments (id);