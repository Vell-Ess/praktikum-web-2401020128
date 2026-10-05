USE praktikum_web_2401020128;

INSERT INTO program_studi (nama_prodi) VALUES
 ('Teknik Informatika'),
 ('Sistem Informasi');

INSERT INTO mahasiswa
 (nim, nama, email, usia, program_studi_id)
VALUES
 ('2401020101', 'Rizky Pratama', 'rizky@example.com', 20, 1),
 ('2401020102', 'Nadia Putri', 'nadia@example.com', 19, 1),
 ('2401020201', 'Fajar Saputra', 'fajar@example.com', 21, 2),
 ('2401020299', 'Data Sementara', 'sementara@example.com', 18, 2);

UPDATE mahasiswa
SET email = 'rizky.pratama@example.com'
WHERE nim = '2401020101';

DELETE FROM mahasiswa
WHERE nim = '2401020299';

SELECT m.nim, m.nama, m.email, m.usia,
 p.nama_prodi
FROM mahasiswa AS m
JOIN program_studi AS p
 ON p.id = m.program_studi_id
ORDER BY m.nim;