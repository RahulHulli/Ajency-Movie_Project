<!DOCTYPE html>
<link rel = "stylesheet" type ="text/css" href="css/style.css">
<HTML>
	<HEAD>
		<BODY class = "pop-up">
            <NAV ID = "navig">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="about.html">About Project</a></li>
                    <li>
                        <FORM ACTION = "search.php" METHOD = "post">
				            <INPUT TYPE = "TEXT" NAME = "name" PLACEHOLDER = "Movie"></INPUT><q1>Name:</q1>
                            <SELECT TYPE = "TEXT" NAME = "genre" PLACEHOLDER = "Genre">
                                <option>Drama</option>
                                <option>Documentary</option>
                                <option>Any</option>
                            </SELECT><q1>Genre:</q1>
                            <INPUT TYPE = "TEXT" NAME = "producer" PLACEHOLDER = "Producer"></INPUT><q1>Producer:</q1>
                            <SELECT TYPE = "TEXT" NAME = "language" PLACEHOLDER = "Language">
                                <option>English</option>
                                <option>Hindi</option>
                                <option>Chinese</option>
                                <option>Any</option></SELECT><q1>Language:</q1><br><br><br>
                            <SELECT TYPE = "TEXT" NAME = "order" PLACEHOLDER = "OrderBy">
                                <option>Ascending</option>
                                <option>Descending</option></SELECT><q1>Order:</q1>
                            <SELECT TYPE = "TEXT" NAME = "sort" PLACEHOLDER = "Sort By">
                                <option>Movie Name</option>
                                <option>Producer</option>
                                <option>Genre</option>
                                <option>Language</option></SELECT><q1>Sort By:</q1>
                            <INPUT TYPE = "SUBMIT" NAME = "SUBMIT" VALUE = "SEARCH"></INPUT>
                        </FORM>
                    </li>
                </ul>
            </NAV>
            <div id = "pop-up">
			<div class = "container">
<?PHP   
    $con = mysqli_connect("localhost","root","","movie_data");
    ECHO '<h1><p>List Of All Movies</p></h1>';
    ECHO '<input type="text" id="myInput" onkeyup="myFunction1()" placeholder="Filter by Movie names..">';    
    $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies order by name ASC");
    ECHO "<center><table style='width=100%' id='myTable'><tr class='header'><th>Movie</th><th>Producer</th><th>Genre</th><th>Language</th><th>Details</th></tr>";
    WHILE($ROW = mysqli_fetch_array($q)){
	   ECHO "<tr class='header'>
                <td>".$ROW[0]."</td>
                <td>".$ROW[1]."</td>
                <td>".$ROW[2]."</td>
                <td>".$ROW[3]."</td>
                <td>";
        ECHO "<a href='disp.php?name=$ROW[0]'>Details";
        ECHO "</td>
            </tr>";
    }
    ECHO "</table></center>";
?>
            
            </div>
            </div>
                <footer id = "footx">
                    <center></center>
                </footer>
<script>
function myFunction1() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
		</BODY>
	</HEAD>
</HTML>
