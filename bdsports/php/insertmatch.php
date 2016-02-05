<form action="startlivegame.php" method="post">
    <center>
        <h1 style="padding: 20px; color: #8AC007">Start Live Game</h1>
        <table>
            
               
            <tr><td>Match ID:</td>
                <td><select name="match_id"><option>Match ID</option><?php
                while ($row = mysql_fetch_array($result2)) {
                    extract($row);
                    echo '<option value="' . $row['match_id'] . '">' . $row['match_id'] . '</option>';
                }
                ?></select></td></tr>
            <tr>
                <td>Home Team:</td>
                <td><select name="hometeam"><option>Team ID</option><?php
                while ($row = mysql_fetch_array($result)) {
                    extract($row);
                    echo '<option value="' . $row['team_id'] . '">' . $row['team_id'] . '</option>';
                }
                ?></select></td>
            </tr>
            <tr>
                <td>Away Team:</td>
                <td><select name="awayteam">
                        <option>Team ID</option><?php
                        while ($row = mysql_fetch_array($result1)) {
                            extract($row);
                            echo '<option value="' . $row['team_id'] . '">' . $row['team_id'] . '</option>';
                        }
                ?></select></td>
            </tr>


        </table>
        <table>
            <tr>
                <td><input  name="livematch" type="submit" value="Start Live Match" /></td>
            </tr>
        </table>
    </center>
    </form>
