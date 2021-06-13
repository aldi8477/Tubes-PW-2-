<table>
    <input type="hidden" id="id_user">
    <tr>
    
        </td>
    </tr>
</table>

<hr>

<fieldset>
    <table id="data" border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>username</th>
                <th>password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
</fieldset>

<script>
        load();
        function load() {
            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", "http://localhost/shoes-store-master/Dashboard1/page/customer/ajaxFile.php?request=1", true);

            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = JSON.parse(this.responseText);
                    let empTable = document.getElementById("data").getElementsByTagName("tbody")[0];

                    empTable.innerHTML = "";

                    for (let key in response) {
                        if (response.hasOwnProperty(key)) {
                            let val = response[key];

                            let NewRow = empTable.insertRow(-1); 
                            let nomer = NewRow.insertCell(0); 
                            let username_cell = NewRow.insertCell(1);
                            let password_cell = NewRow.insertCell(2);
                            let aksi_cell = NewRow.insertCell(3);

                            nomer.innerHTML = val['nomer'];
                            username_cell.innerHTML = val['username'];
                            password_cell.innerHTML = val['password'];
                            aksi_cell.innerHTML = ' <button onclick="hapus('+ val['id_user'] +')">Hapus</button>'; 
                            
                        }
                    } 

                }
            };

            xhttp.send();

            
        }


        function hapus(id_user) {
            let xhttp = new XMLHttpRequest();
            let konfirmasi = confirm(" Hapus  user?");

            if (konfirmasi) {
                xhttp.open("GET", "http://localhost/shoes-store-master/Dashboard1/page/customer/ajaxFile.php?request=3&id_user="+id_user, true);

                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        let response = this.responseText;
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

        let id_user = document.getElementById('id_user').value;
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;


if(username != '' ){

    var data = { id_user : id_user, username : username };
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "http://localhost/shoes-store-master/Dashboard1/page/customer/ajaxFile.php?request=5", true);

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