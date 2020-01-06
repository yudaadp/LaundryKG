 <?php
	// tuliskan teks apa saja, termasuk tabel atau image
	// untuk di konversi ke PDF
	$html .= "Teks untuk mencoba saja. <br /> Teks untuk mencoba saja. <br />
Teks untuk mencoba saja. <br />Teks untuk mencoba saja. <br />";
	$html .= '------------------------------------------------------';
	// mulai menggunakan mPDF
	include ("mpdf.php");
	/*
	 * lihat method constructor pada file mpdf.php
	 * / disana terdapat penjelasan lebih detail tentang parameternya,
	 * atau lihatlah dokumentasinya
	 */
	
	// A4 maksudnya ukuran kertas
	$mpdf = new mPDF ( 'utf-8', 'A4', 0, '', 10, 10, 5, 1, 1, 1, '' );
	$mpdf->WriteHTML ( $html );
	$mpdf->Output ();
	?>
