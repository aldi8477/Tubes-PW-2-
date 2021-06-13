<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <table>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td>
                <input type="text" id="username">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td>
                <input type="password" id="password">
            </td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td>:</td>
            <td>
                <input type="password" id="confirm_password">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <button id="btn" onclick="insert()">Submit</button>
            </td>
        </tr>
    </table>

    <script>
        function insert() {

        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        let confirm = document.getElementById('confirm_password').value;
        
        if(username != '' && password !='' && confirm != ''){

            var data = { username : username, password : password};
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "ajax.php", true);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var response = this.responseText;
                    if(response == 1){
                        alert("Insert successfully.");

                        document.getElementById('username').value = '';
                        document.getElementById('password').value = '';
                        document.getElementById('confirm_password').value = '';
                    }
                }
            };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        } else {
            alert('Data Tidak Boleh Kosong');
        }

    }
    </script>

</body>
</html>