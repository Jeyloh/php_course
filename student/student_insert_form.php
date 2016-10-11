<html>
<head>
    <title>Student Insert Form</title>
    <style type="text/css">
        td {font-family: tahoma, arial, verdana; font-size: 10pt }
    </style>
</head>
<body>
    
    <table width="300" cellpadding="5" cellspacing="0" border="2">
        <tr align="center" valign="top">
            <td align="left" colspan="1" rowspan="1" bgcolor="64b1ff">
                <h3>Insert Record</h3>

                <form method="GET" action="student_insert_record.php">
                    Enter Student Number: <input type=text name=studentNo size=30 value="W200"><br>
                    
                    <fieldset>
                        <legend>Personal information:</legend>
                        Enter Title: <select name='title'>
                        <option value="" disabled="disabled" selected="selected">Please select</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                        <option value="Dr">Dr.</option>
                    </select><br>
                    Enter Firstname: <input type=text name="firstname" size=30><br>
                    Enter Lastname: <input type=text name=lastname size=30><br>
                </fieldset>
                Enter Date Of Birth (dd/mm/yy): <input type=text name=birthday size=20><br>
                Enter Gender: <input type="radio" name=gender value="M" checked>Male<input type="radio" name="gender" value="F">Female<br> 
                Enter Address 1: <input type=text name=address1 size=30><br>
                Enter Address 2: <input type=text name=address2 size=30><br>
                Enter Address 3: <input type=text name=address3 size=30><br>
                Enter Country: <input type=text name=country size=30><br>
                Enter Phone: <input type=text name=phone size=30><br>
                Enter Email: <input required type=email name=email size=30><br>
                Enter Password <input required type=password name=password size=30><br>
                Confirm Password <input required type=password name=confirmpw size=30><br>
                <br>
                <input type=submit value=Insert><input type=reset>

            </form>
        </td>
        </tr>
        </table>
        
        
        
    </body>
    </html>