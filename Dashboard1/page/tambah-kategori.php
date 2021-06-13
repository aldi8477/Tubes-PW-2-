
Nama Kategori : <input type="text" id="name" name="nama_kategori">
<input id="btn-login" type="button" onclick="insert()" value="Tambah">

<script>
    function insert() {
        let kategori = document.getElementById('kategori').value;

        if(kategori != ''){

            let data = { kategori : kategori };
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "http://localhost/shoes-store-master/dashboard1/page/insert.php", true);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var response = this.responseText;
                    if(response == 1){
                        alert("Insert successfully.");

                        document.getElementById("kategori").value = '';
                    }
                }
            };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        }
    }
</script>