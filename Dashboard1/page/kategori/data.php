<table>
	<tr>
		<th>Nama Kategori</th>
		<td>:</td>
		<td><input type="text" id="nama_kategori"></td>
	</tr>
	
	<input type="hidden" id="id">
	<tr>
		<td></td>
		<td></td>
		<td><button id="btn" onclick="insert()">Submit</button> <button id="btn_update" onclick="update()" hidden>Update</button></td>
	</tr>
</table>

<hr>

<table id="data" border="1" cellspacing="0" cellpadding="10">
	<thead>
		<th>No</th>
		<th>Nama kategori</th>
		<th>Aksi</th>
	</thead>
	<tbody>
	
	</tbody>
</table>

<script>
	load();

	function load() {
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "http://localhost/shoes-store-master/Dashboard1/page/kategori/ajaxFile.php?request=1", true);

		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				var response = JSON.parse(this.responseText);
				var empTable = document.getElementById("data").getElementsByTagName("tbody")[0];

				empTable.innerHTML = "";

				for (var key in response) {
					if (response.hasOwnProperty(key)) {
						var val = response[key];

						var NewRow = empTable.insertRow(-1); 
						let nomer = NewRow.insertCell(0);
						var nama_kategori = NewRow.insertCell(1);
						var aksi_cell = NewRow.insertCell(2);

						nomer.innerHTML = val['nomer']; 
						nama_kategori.innerHTML = val['nama_kategori'];
						aksi_cell.innerHTML = '<button onclick="edit('+ val['id_kategori'] +')" id="btn_edit">Edit</button> &bull; <button onclick="hapus('+ val['id_kategori'] +')">Hapus</button>'; 

					}
				} 

			}
		};

		xhttp.send();


	}

	function insert() {

		var nama_kategori = document.getElementById('nama_kategori').value;
		

		if(nama_kategori !=''){

			var data = {nama_kategori: nama_kategori,};
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "http://localhost/shoes-store-master/Dashboard1/page/kategori/ajaxFile.php?request=2", true);

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					var response = this.responseText;
					if(response == 1){
						alert("Insert successfully.");

						load();

						document.getElementById("id_kategori").value = "";
						document.getElementById("nama_kategori").value = "";
						
					}
				}
			};

			xhttp.setRequestHeader("Content-Type", "application/json");

			xhttp.send(JSON.stringify(data));
		}

	}

	function edit(id_kategori) {
		var nama_kategori = document.getElementById('nama_kategori');
		var btn = document.getElementById('btn');
		var btn_edit = document.getElementById('btn_edit');
		var btn_update = document.getElementById('btn_update');

		btn.hidden = true;
		btn_update.hidden = false;

		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "http://localhost/shoes-store-master/Dashboard1/page/kategori/ajaxFile.php?request=4&id_kategori="+id_kategori, true);

		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

				var response = JSON.parse(this.responseText);

				for (var key in response) {
					if (response.hasOwnProperty(key)) {
						var val = response[key];

						nama_kategori.value = val['nama_kategori']; 
					    document.getElementById("id").value = val['id_kategori'];
					}
				} 

			}
		};

		xhttp.send();
	}

	function hapus(id_kategori) {
		var xhttp = new XMLHttpRequest();
		var konfirmasi = confirm("Yakin ? Mau di Hapus ?");

		if (konfirmasi) {
			xhttp.open("GET", "http://localhost/shoes-store-master/Dashboard1/page/kategori/ajaxFile.php?request=3&id_kategori="+id_kategori, true);

			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					var response = this.responseText;
					if(response == 1){
						alert("Delete successfully.");

						load();
					}

				}
			};

			xhttp.send();
		}
	}

	function update() {

		let id_kategori = document.getElementById('id').value;
		let nama_kategori = document.getElementById('nama_kategori').value;
		

		if(nama_kategori !='' ){

			var data = { id_kategori : id_kategori, nama_kategori : nama_kategori};
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "http://localhost/shoes-store-master/Dashboard1/page/kategori/ajaxfile.php?request=5", true);

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					var response = this.responseText;
					if(response == 1){
						alert("Update successfully.");

						load();
					}
				}
			};

			xhttp.setRequestHeader("Content-Type", "application/json");

			xhttp.send(JSON.stringify(data));
		}
	}
</script>