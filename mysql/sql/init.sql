DROP SCHEMA IF EXISTS webapp;
CREATE SCHEMA webapp;
USE webapp;

DROP TABLE IF EXISTS studylog;
CREATE TABLE studylog (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  study_date DATE NOT NULL,
  content VARCHAR(200) NOT NULL,
  programming_language VARCHAR(200) NOT NULL,
  study_time INT not NULL,
  comment VARCHAR(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO studylog SET study_date='2021/09/01', content='N予備校', programming_language='HTML', study_time='5', comment='頑張りました。';
INSERT INTO studylog SET study_date='2021/09/02', content='ドットインストール', programming_language='CSS', study_time='3', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/09/03', content='POSSE課題', programming_language='JavaScript', study_time='7', comment='頑張った';
INSERT INTO studylog SET study_date='2021/09/04', content='POSSE課題', programming_language='JavaScript', study_time='10', comment='疲れた';
INSERT INTO studylog SET study_date='2021/09/05', content='N予備校', programming_language='PHP', study_time='1', comment='疲れたー';
