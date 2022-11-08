<html>
<head>
    <title>PHP login system</title>

    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
    <div id = "frm">
        <h1>Login</h1>
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST">
            <p>
                <label> Prisijungimo vardas: </label>
                <input type = "text" id ="user" name  = "user" />
            </p>
            <p>
                <label> Slaptažodis: </label>
                <input type = "password" id ="pass" name  = "pass" />
            </p>
            <p>
                <input type =  "submit" id = "btn" value = "Prisijungti" />
            </p>
        </form>
    </div>

    <script>
            function validation()
            {
                var id=document.f1.user.value;
                var ps=document.f1.pass.value;
                if(id.length=="" && ps.length=="") {
                    alert("User Name and Password fields are empty");
                    return false;
                }
                else
                {
                    if(id.length=="") {
                        alert("User Name is empty");
                        return false;
                    }
                    if (ps.length=="") {
                    alert("Password field is empty");
                    return false;
                    }
                }
            }
        </script>
</body>
</html>
