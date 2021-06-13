<a href="?page=tambah-kategori"> Tambah Data</a>
<hr>
<table id="data" border="1" cellspacing="0" cellpadding="10">
<thead>
<tr>
<th>Nama Kategori</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
</tbody>
</table>

<script>
load();

function load() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost/shoes-store-master/dashboard1/page/tampil.php", true);
    
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            var response = JSON.parse(this.responseText);
            var empTable = document.getElementById("data").getElementsByTagName("tbody")[0];
            
            empTable.innerHTML = "";
            
            for (var key in response) {
                if (response.hasOwnProperty(key)) {
                    var val = response[key];
                    
                    var NewRow = empTable.insertRow(0); 
                    var kategori = NewRow.insertCell(0); 
                    var aksi_cell = NewRow.insertCell(1);
                    
                    kategori.innerHTML = val['kategori']; 
                    aksi_cell.innerHTML = '<button onclick="edit('+ val['id_kategori'] +')" id_kategori="btn_edit">Edit</button> &bull; <button onclick="hapus('+ val['id_kategori'] +')">Hapus</button>'; 
                    
                }
            } 
            
        }
    };
    
    xhttp.send();   
}

function hapus(id) {
    let xhttp = new XMLHttpRequest();
    let konfirmasi = confirm("Yakin ? Mau di Hapus ?");
    
    if (konfirmasi) {
        xhttp.open("GET", "http://localhost/shoes-store-master/dashboard1/page/hapus-kategori.php?id_kategori="+id_kategori, true);
        
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
</script>