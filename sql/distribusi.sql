SELECT SUM(a.jumlah), a.kd_barang, b.tanggal  FROM detail_distribusi a,distribusi b
 WHERE a.kd_distribusi=b.kd_distribusi AND b.tanggal = '2017-01-20' GROUP BY a.kd_barang, b.tanggal