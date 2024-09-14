// Mendefinisikan fungsi untuk mencetak halaman tertentu
function printPage(page, size) {
	// Membuat elemen cetak baru dengan ukuran yang diinginkan
	var printWindow = window.open(
		"",
		"_blank",
		"width=" + size.width + ",height=" + size.height
	);

	// Menambahkan konten halaman yang akan dicetak
	printWindow.document.write(page);

	// Menunggu konten halaman selesai dimuat
	printWindow.document.addEventListener(
		"DOMContentLoaded",
		function () {
			// Melakukan cetak
			printWindow.print();
			// Menutup jendela cetak
			printWindow.close();
		},
		false
	);
}
