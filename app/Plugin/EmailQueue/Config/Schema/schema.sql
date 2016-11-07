DROP TABLE IF EXISTS `email_queue`;
CREATE TABLE IF NOT EXISTS `email_queue` (
  `id` char(36) CHARACTER SET ascii NOT NULL,
  `to` varchar(129) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `config` varchar(30) NOT NULL,
  `template` varchar(50) NOT NULL,
  `layout` varchar(50) NOT NULL,
  `format` varchar(5) NOT NULL,
  `template_vars` text NOT NULL,
  `sent` tinyint(1) NOT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `send_tries` int(2) NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--- POSTGRESQL
CREATE TABLE dbo.tk_email_queue
(
   id serial, 
   "to" character varying(129), 
   from_name character varying(255), 
   from_mail character varying(255), 
   subject character varying(255), 
   config character varying(30), 
   template character varying(50), 
   layout character varying(50), 
   format character varying(5), 
   template_vars text, 
   sent boolean DEFAULT false, 
   locked boolean DEFAULT false, 
   send_tries integer, 
   send_at timestamp without time zone, 
   created timestamp without time zone, 
   modified timestamp without time zone, 
   PRIMARY KEY (id)
) 
WITH (
  OIDS = FALSE
)
;