<style>
        form{
            background-color: red;
            width: 355px;
            padding: 10px;
            margin: auto;
        }
        .radio{
            margin: 10px;
        }
        .button{
            width: 350px;
            padding: 5px;
            background-color: pink;

        }
    </style>
<form method="post" action="" >
        
        <table>
            <tr>
                <td><label for="textBox">Registration</label></td>
            </tr>
            <tr>
                <td>Full name</td>
                <td>User name</td>
            </tr>
            <tr>
                <td>
                    <input type="text">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>Phone number</td>
            </tr>
            <tr>
                <td>
                    <input type="text">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>Confirm Password</td>
            </tr>
            <tr>
                <td>
                    <input type="text">
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td colspan="2">Gender</td>
            </tr>
            <tr>
                <td colspan="3">
                    <input class="radio" name="gender" type="radio" value="Nam"/> Male
                    <input class="radio" name="gender" type="radio" value="Nữ" /> Female
                    <input class="radio" name="gender" type="radio" value="Khác" /> Prefer not to say
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <input class="button" type="button" value="Register" >
                </td>
            </tr>
        </table>
        <tr>
            <td>

            </td>
        </tr>
        
    </form>