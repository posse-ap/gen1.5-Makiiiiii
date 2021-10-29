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
INSERT INTO studylog SET study_date='2021/09/01', content='POSSE課題', programming_language='JavaScript', study_time='2', comment='頑張れた。';
INSERT INTO studylog SET study_date='2021/09/02', content='ドットインストール', programming_language='CSS', study_time='3', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/09/02', content='N予備校', programming_language='CSS', study_time='1', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/09/03', content='POSSE課題', programming_language='JavaScript', study_time='7', comment='頑張った';
INSERT INTO studylog SET study_date='2021/09/03', content='ドットインストール', programming_language='JavaScript', study_time='2', comment='つっかれた';
INSERT INTO studylog SET study_date='2021/09/04', content='POSSE課題', programming_language='JavaScript', study_time='10', comment='疲れた';
INSERT INTO studylog SET study_date='2021/09/05', content='N予備校', programming_language='PHP', study_time='1', comment='疲れたー';
INSERT INTO studylog SET study_date='2021/09/06', content='ドットインストール', programming_language='SQL', study_time='15', comment='楽しかった！';
INSERT INTO studylog SET study_date='2021/09/07', content='N予備校', programming_language='PHP', study_time='2', comment='疲れたー';
INSERT INTO studylog SET study_date='2021/09/08', content='POSSE課題', programming_language='CSS', study_time='1', comment='勉強になった';
INSERT INTO studylog SET study_date='2021/09/09', content='ドットインストール', programming_language='PHP', study_time='5', comment='頑張りました';
INSERT INTO studylog SET study_date='2021/09/10', content='N予備校', programming_language='Laravel', study_time='1', comment='疲れたー';
INSERT INTO studylog SET study_date='2021/09/11', content='ドットインストール', programming_language='HTML', study_time='8', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/09/12', content='POSSE課題', programming_language='JavaScript', study_time='7', comment='頑張った';
INSERT INTO studylog SET study_date='2021/09/13', content='ドットインストール', programming_language='CSS', study_time='3', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/09/14', content='POSSE課題', programming_language='情報処理システム基礎知識(その他)', study_time='7', comment='頑張った';
INSERT INTO studylog SET study_date='2021/09/15', content='POSSE課題', programming_language='JavaScript', study_time='10', comment='疲れた';
INSERT INTO studylog SET study_date='2021/09/16', content='N予備校', programming_language='HTML', study_time='5', comment='頑張りました。';
INSERT INTO studylog SET study_date='2021/09/17', content='N予備校', programming_language='SHELL', study_time='1', comment='疲れたー';
INSERT INTO studylog SET study_date='2021/09/18', content='N予備校', programming_language='PHP', study_time='2', comment='疲れたー';
INSERT INTO studylog SET study_date='2021/09/19', content='ドットインストール', programming_language='HTML', study_time='8', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/09/20', content='ドットインストール', programming_language='情報処理システム基礎知識(その他)', study_time='15', comment='楽しかった！';
INSERT INTO studylog SET study_date='2021/09/21', content='ドットインストール', programming_language='CSS', study_time='3', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/09/22', content='POSSE課題', programming_language='CSS', study_time='1', comment='勉強になった';
INSERT INTO studylog SET study_date='2021/09/23', content='N予備校', programming_language='HTML', study_time='5', comment='頑張りました。';
INSERT INTO studylog SET study_date='2021/09/24', content='POSSE課題', programming_language='JavaScript', study_time='10', comment='疲れた';
INSERT INTO studylog SET study_date='2021/09/25', content='N予備校', programming_language='PHP', study_time='1', comment='疲れたー';
INSERT INTO studylog SET study_date='2021/09/26', content='ドットインストール', programming_language='PHP', study_time='5', comment='頑張りました';
INSERT INTO studylog SET study_date='2021/09/27', content='N予備校', programming_language='Laravel', study_time='1', comment='疲れたー';
INSERT INTO studylog SET study_date=e2021/09/28', content='ドットインストール', programming_language='PHP', study_time='15', comment='楽しかった！';
INSERT INTO studylog SET study_date='2021/09/29', content='N予備校', programming_language='PHP', study_time='2', comment='疲れたー';
INSERT INTO studylog SET study_date='2021/09/30', content='ドットインストール', programming_language='CSS', study_time='8', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/10/01', content='ドットインストール', programming_language='HTML', study_time='2', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/10/02', content='POSSE課題', programming_language='JavaScript', study_time='7', comment='頑張った！';
INSERT INTO studylog SET study_date='2021/10/02', content='ドットインストール', programming_language='HTML', study_time='1', comment='頑張った！';