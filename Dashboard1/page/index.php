<table>
	<input type="hidden" id="id_tipe">
	<tr>
		<td>Tipe Kamar</td>
		<td>:</td>
		<td>
			<input type="text" id='tipe_kamar'>
		</td>
	</tr>
	<tr>
		<td>Deskripsi</td>
		<td>:</td>
		<td>
			<input type="text" id='deskripsi'>
		</td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td>
			<input type="text" id='harga'>
		</td>
	</tr>
	<tr>
		<td>Jumlah Bed</td>
		<td>:</td>
		<td>
			<input type="number" id="jumlah_bed">
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<input type="button" id="btn" value="Simpan" onclick="insertNewEmployee();">
			<button id="btn_update" onclick="update()" hidden>Update</button>
		</td>
	</tr>
</table>
<hr>

<fieldset>
	<legend>
		Data Employee
	</legend>
	<table id='empTable' border='1' cellpadding="10" >
		<thead>
			<tr>
				<th>No</th>
				<th>Tipe Kamar</th>
				<th>Deskripsi</th>
				<th>Harga</th>
				<th>Jumlah Bed</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
</fieldset>

<script type="text/javascript">
	loadEmployees();

	function loadEmployees() {
		let xhttp = new XMLHttpRequest();

		xhttp.open("GET", "ajaxfile.php?request=1", true);

		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				let response = JSON.parse(this.responseText);

				let empTable = document.getElementById("empTable").getElementsByTagName("tbody")[0];

				empTable.innerHTML = "";

				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						let NewRow = empTable.insertRow(0); 
						let no = NewRow.insertCell(0);
						let tipe_kamar = NewRow.insertCell(1); 
						let deskripsi = NewRow.insertCell(2); 
						let harga = NewRow.insertCell(3);
						let jumlah_bed = NewRow.insertCell(4);
						let aksi_cell = NewRow.insertCell(5);

						no.innerHTML = val['no'];
						tipe_kamar.innerHTML = val['tipe_kamar']; 
						deskripsi.innerHTML = val['deskripsi']; 
						harga.innerHTML = val['harga']; 
						jumlah_bed.innerHTML = val['jumlah_bed'];
						aksi_cell.innerHTML = '<button onclick="edit('+ val['id_tipe'] +')" id="btn_edit">Edit</button> &bull; <button onclick="hapus('+ val['id_tipe'] +')">Hapus</button>';
					}
				} 
			}
		};

		xhttp.send();
	}

	function insertNewEmployee() {

		let tipe_kamar = document.getElementById('tipe_kamar').value;
		let deskripsi = document.getElementById('deskripsi').value;
		let harga = document.getElementById('harga').value;
		let jumlah_bed = document.getElementById('jumlah_bed').value;

		if(tipe_kamar != '' && deskripsi !='' && harga != '' && jumlah_bed != ''){

			let data = {tipe_kamar : tipe_kamar, deskripsi : deskripsi, harga : harga, jumlah_bed : jumlah_bed};
			let xhttp = new XMLHttpRequest();
	
			xhttp.open("POST", "ajaxfile.php?request=2", true);


			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					let response = this.responseText;
					if(response == 1){
						alert("Insert successfully.");


						loadEmployees();

						document.getElementById("tipe_kamar").value = '';
						document.getElementById("deskripsi").value = '';
						document.getElementById("harga").value = '';
						document.getElementById("jumlah_bed").value = '';
					}
				}
			};

			xhttp.setRequestHeader("Content-Type", "application/json");
			xhttp.send(JSON.stringify(data));
		}
	}

	function hapus(id_tipe) {
		let xhttp = new XMLHttpRequest();
		let konfirmasi = confirm("Yakin ? Mau di Hapus ?");

		if (konfirmasi) {
			xhttp.open("GET", "ajaxfile.php?request=3&id_tipe="+id_tipe, true);

			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					let response = this.responseText;
					if(response == 1){
						alert("Delete successfully.");

						loadEmployees();
					}

				}
			};

			xhttp.send();

		}
	}

	function edit(id_tipe) {
		let tipe_kamar = document.getElementById('tipe_kamar');
		let deskripsi = document.getElementById('deskripsi');
		let harga = document.getElementById('harga');
		let jumlah_bed = document.getElementById('jumlah_bed');
		let btn = document.getElementById('btn');
		let btn_edit = document.getElementById('btn_edit');
		let btn_update = document.getElementById('btn_update');

		btn.hidden = true;
		btn_update.hidden = false;

		let xhttp = new XMLHttpRequest();
		xhttp.open("GET", "ajaxfile.php?request=4&id_tipe="+id_tipe, true);

		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				let response = JSON.parse(this.responseText);

				for (let key in response) {
					if (response.hasOwnProperty(key)) {
						let val = response[key];

						tipe_kamar.value = val['tipe_kamar'];
						deskripsi.value = val['deskripsi'] 
						harga.value = val['harga']; 
						jumlah_bed.value = val['jumlah_bed'];
						document.getElementById("id_tipe").value = val['id_tipe'];

					}
				} 

			}
		};

		xhttp.send();
	}

	function update() {

		let id_tipe = document.getElementById('id_tipe').value;
		let tipe_kamar = document.getElementById('tipe_kamar').value;
		let deskripsi = document.getElementById('deskripsi').value;
		let harga = document.getElementById('harga').value;
		let jumlah_bed = document.getElementById('jumlah_bed').value;
		let btn_edit = document.getElementById('btn_edit');
		let btn_update = document.getElementById('btn_update');

		if(tipe_kamar != '' && deskripsi !='' && harga != '' && jumlah_bed != ''){

			let data = { id_tipe : id_tipe, tipe_kamar : tipe_kamar, deskripsi : deskripsi, harga : harga,jumlah_bed : jumlah_bed};

			let xhttp = new XMLHttpRequest();

			xhttp.open("POST", "ajaxfile.php?request=5", true);

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					let response = this.responseText;
					if(response == 1){
						alert("Update successfully.");

						loadEmployees();

						document.getElementById("id_tipe").value = '';
						document.getElementById("tipe_kamar").value = '';
						document.getElementById("deskripsi").value = '';
						document.getElementById("harga").value = '';
						document.getElementById("jumlah_bed").value = '';

						btn.hidden = false;
						btn_update.hidden = true;
					}
				}
			};

			xhttp.setRequestHeader("Content-Type", "application/json");

			xhttp.send(JSON.stringify(data));
		}
	}


</script>