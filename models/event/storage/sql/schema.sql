DROP TABLE IF EXISTS event;
CREATE TABLE event (
  id int(11) NOT NULL auto_increment,  
  name varchar(255) default NULL,
  created int(11) NOT NULL default '0',
  updated int(11) NOT NULL default '0',
  PRIMARY KEY (id)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS article;
CREATE TABLE article (
  event_id int(11) NOT NULL default '0',
  article_id varchar(255) default NULL,
  PRIMARY KEY (event_id, article_id)
) ENGINE=InnoDB;
