# Host: localhost  (Version 5.0.41-community-nt)
# Date: 2018-04-13 21:28:12
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "alunos"
#

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos` (
  `cod_aluno` int(5) NOT NULL auto_increment,
  `nome_aluno` varchar(255) NOT NULL default '',
  `serie` varchar(255) default NULL,
  `turma` varchar(3) default NULL,
  `prof_regente` varchar(255) default NULL,
  `turno` varchar(5) default NULL,
  `matematica` varchar(1) NOT NULL default '',
  `portugues` varchar(1) NOT NULL default '',
  `ciencias` varchar(1) NOT NULL default '',
  `geografia` varchar(1) NOT NULL default '',
  `historia` varchar(1) NOT NULL default '',
  `ingles` varchar(1) NOT NULL default '',
  `ens_reg` varchar(1) NOT NULL default '',
  `ed_fis` varchar(1) NOT NULL default '',
  `artes` varchar(1) NOT NULL default '',
  PRIMARY KEY  (`cod_aluno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "pareceres_161"
#

DROP TABLE IF EXISTS `pareceres_161`;
CREATE TABLE `pareceres_161` (
  `cod` int(5) NOT NULL auto_increment,
  `materia` varchar(255) NOT NULL default '',
  `parecer_A` text NOT NULL,
  `parecer_B` text NOT NULL,
  `parecer_C` text NOT NULL,
  `parecer_D` text NOT NULL,
  `parecer_E` text NOT NULL,
  PRIMARY KEY  (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "pareceres_162"
#

DROP TABLE IF EXISTS `pareceres_162`;
CREATE TABLE `pareceres_162` (
  `cod` int(5) NOT NULL auto_increment,
  `materia` varchar(255) NOT NULL default '',
  `parecer_A` text NOT NULL,
  `parecer_B` text NOT NULL,
  `parecer_C` text NOT NULL,
  `parecer_D` text NOT NULL,
  `parecer_E` text NOT NULL,
  PRIMARY KEY  (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "pareceres_171"
#

DROP TABLE IF EXISTS `pareceres_171`;
CREATE TABLE `pareceres_171` (
  `cod` int(5) NOT NULL auto_increment,
  `materia` varchar(255) NOT NULL default '',
  `parecer_A` text NOT NULL,
  `parecer_B` text NOT NULL,
  `parecer_C` text NOT NULL,
  `parecer_D` text NOT NULL,
  `parecer_E` text NOT NULL,
  PRIMARY KEY  (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "pareceres_172"
#

DROP TABLE IF EXISTS `pareceres_172`;
CREATE TABLE `pareceres_172` (
  `cod` int(5) NOT NULL auto_increment,
  `materia` varchar(255) NOT NULL default '',
  `parecer_A` text NOT NULL,
  `parecer_B` text NOT NULL,
  `parecer_C` text NOT NULL,
  `parecer_D` text NOT NULL,
  `parecer_E` text NOT NULL,
  PRIMARY KEY  (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "pareceres_181"
#

DROP TABLE IF EXISTS `pareceres_181`;
CREATE TABLE `pareceres_181` (
  `cod` int(5) NOT NULL auto_increment,
  `materia` varchar(255) NOT NULL default '',
  `parecer_A` text NOT NULL,
  `parecer_B` text NOT NULL,
  `parecer_C` text NOT NULL,
  `parecer_D` text NOT NULL,
  `parecer_E` text NOT NULL,
  PRIMARY KEY  (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "pareceres_182"
#

DROP TABLE IF EXISTS `pareceres_182`;
CREATE TABLE `pareceres_182` (
  `cod` int(5) NOT NULL auto_increment,
  `materia` varchar(255) NOT NULL default '',
  `parecer_A` text NOT NULL,
  `parecer_B` text NOT NULL,
  `parecer_C` text NOT NULL,
  `parecer_D` text NOT NULL,
  `parecer_E` text NOT NULL,
  PRIMARY KEY  (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "pareceres_191"
#

DROP TABLE IF EXISTS `pareceres_191`;
CREATE TABLE `pareceres_191` (
  `cod` int(5) NOT NULL auto_increment,
  `materia` varchar(255) NOT NULL default '',
  `parecer_A` text NOT NULL,
  `parecer_B` text NOT NULL,
  `parecer_C` text NOT NULL,
  `parecer_D` text NOT NULL,
  `parecer_E` text NOT NULL,
  PRIMARY KEY  (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "pareceres_192"
#

DROP TABLE IF EXISTS `pareceres_192`;
CREATE TABLE `pareceres_192` (
  `cod` int(5) unsigned NOT NULL auto_increment,
  `materia` varchar(255) NOT NULL default '',
  `parecer_A` text NOT NULL,
  `parecer_B` text NOT NULL,
  `parecer_C` text NOT NULL,
  `parecer_D` text NOT NULL,
  `parecer_E` text NOT NULL,
  PRIMARY KEY  (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "textos"
#

DROP TABLE IF EXISTS `textos`;
CREATE TABLE `textos` (
  `codText` int(1) NOT NULL auto_increment,
  `aluno` varchar(255) NOT NULL,
  `matematica` text NOT NULL,
  `portugues` text NOT NULL,
  `ciencias` text NOT NULL,
  `geografia` text NOT NULL,
  `historia` text NOT NULL,
  `ingles` text NOT NULL,
  `ed_fis` text NOT NULL,
  `artes` text NOT NULL,
  `ens_reg` text NOT NULL,
  PRIMARY KEY  (`codText`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
