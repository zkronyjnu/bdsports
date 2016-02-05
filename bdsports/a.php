
		<td>
			<select name="day">
				<option>Day</option>
				<option>01</option>
				<option>02</option>
				<option>03</option>
				<option>04</option>
				<option>05</option>
				<option>06</option>
				<option>07</option>
				<option>08</option>
				<option>09</option>
				<?php 
				
				for($i=10;$i<=31;$i++)
				{
				echo "<option>$i</option>";
				}
				?>
			</select>
			<select name="month">
				<option>Month</option>
				<option value='01'>January</option>
				<option value='02'>February</option>
				<option value='03'>March</option>
				<option value='04'>April</option>
				<option value='05'>May</option>
				<option value='06'>June</option>
				<option value='07'>July</option>
				<option value='08'>August</option>
				<option value='09'>September</option>
				<option value='10'>October</option>
				<option value='11'>November</option>
				<option value='12'>December</option>
			</select>
			<select name="year">
				<option>Year</option>
				<?php 
				for($i=1971;$i<=2020;$i++)
				{
				echo "<option>$i</option>";
				}
				?>
			</select>
</td>
