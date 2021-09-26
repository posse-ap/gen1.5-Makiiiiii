DROP SCHEMA IF EXISTS kuizy;
CREATE SCHEMA kuizy;
USE kuizy;

DROP TABLE IF EXISTS areas;
CREATE TABLE areas (
  id int(11) NOT NULL,
  area varchar(100) CHARACTER SET utf8 NOT NULL
);

INSERT INTO areas SET id=1, area='東京の難読地名クイズ';
INSERT INTO areas SET id=2, area='広島の難読地名クイズ';

DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  area_id int(11) NOT NULL,
  question_id int(11) NOT NULL,
  answer_1 varchar(100) CHARACTER SET utf8 NOT NULL,
  answer_2 varchar(100) CHARACTER SET utf8 NOT NULL,
  answer_3 varchar(100) CHARACTER SET utf8 NOT NULL
);

INSERT INTO questions (area_id, question_id, answer_1, answer_2, answer_3) VALUES
(1, 1, 'たかなわ', 'こうわ', 'たかわ'),
(1, 2, 'かめいど', 'かめと', 'かめど'),
(1, 3, 'こうじまち', 'かゆまち', 'おかとまち'),
(1, 4, 'おなりもん', 'おかどもん', 'ごせいもん'),
(1, 5, 'とどろき', 'たたら', 'たたろき'),
(1, 6, 'しゃくじい', 'せきこうい', 'いじい'),
(1, 7, 'ぞうしき', 'ざっしき', 'ざっしょく'),
(1, 8, 'おかちまち', 'みとちょう', 'ごしろちょう'),
(1, 9, 'ししぼね', 'ろっこつ', 'しこね'),
(1, 10, 'こぐれ', 'こばく', 'こしゃく'),
(2, 1, 'いばらいち', 'せいげんち', 'いのはらし'),
(2, 2, 'かるが', 'いがるけ', 'かりどめや'),
(2, 3, 'へら', 'たいら', 'ひらよし'),
(2, 4, 'すもも', 'ざくろ', 'はっさく'),
(2, 5, 'おにはら', 'ほにわ', 'こじぼら'),
(2, 6, 'あぞうだに', 'あそご', 'ゆうげ'),
(2, 7, 'おなごばた', 'めこばた', 'にょしら'),
(2, 8, 'むかいなだ', 'かなた', 'むこうみ'),
(2, 9, 'ひととばら', 'もずはら', 'しのめはら'),
(2, 10, 'おかじま', 'ちかじま', 'こわしま');
