<!DOCTYPE html>
<link rel = "stylesheet" type ="text/css" href="css/style.css">
<html>
<HEAD>
	<BODY class = "pop-up">
					<NAV ID = "navig">
							<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="contacts.html">Contacts</a></li>
									<li><a href="about.html">About Us</a></li>
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
            ECHO '<h1><p>Search Results</p></h1>';
            
            $MOVIES = $_POST['name'];
            $GENRE = $_POST['genre'];
            $PRODUCER = $_POST['producer'];
            $LANGUAGE = $_POST['language'];
            $SORT = $_POST['sort'];
            $SORTORDER = $_POST['order'];
            
            if($SORT == 'Movie Name')
                $SORT = 'name';
            if($SORT == 'Producer')
                $SORT = 'producer';
            if($SORT == 'Genre')
                $SORT = 'genre';
            if($SORT == 'Language')
                $SORT = 'language';
            
            if($SORTORDER == 'Descending')
                $SORTORDER = 'DESC';
            if($SORTORDER == 'Ascending')
                $SORTORDER = 'ASC';
            
            
            if($GENRE == 'Any')
                $GENRE = NULL;
            if($LANGUAGE == 'Any')
                $LANGUAGE = NULL;
            
            $con = mysqli_connect("localhost","root","","movie_data");
            ECHO '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Filter by Movie names..">';
            
            if(($MOVIES!=NULL)&&($GENRE==NULL)&&($PRODUCER==NULL)&&($LANGUAGE==NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE name = '$MOVIES' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES==NULL)&&($GENRE!=NULL)&&($PRODUCER==NULL)&&($LANGUAGE==NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE genre = '$GENRE' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES==NULL)&&($GENRE==NULL)&&($PRODUCER!=NULL)&&($LANGUAGE==NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE producer = '$PRODUCER' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES==NULL)&&($GENRE==NULL)&&($PRODUCER==NULL)&&($LANGUAGE!=NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE language = '$LANGUAGE' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES!=NULL)&&($GENRE!=NULL)&&($PRODUCER==NULL)&&($LANGUAGE==NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE name = '$MOVIES' AND genre = '$GENRE' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES!=NULL)&&($GENRE==NULL)&&($PRODUCER!=NULL)&&($LANGUAGE==NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE name = '$MOVIES' AND producer = '$PRODUCER' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES!=NULL)&&($GENRE==NULL)&&($PRODUCER==NULL)&&($LANGUAGE!=NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE name = '$MOVIES' AND language = '$LANGUAGE' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES==NULL)&&($GENRE!=NULL)&&($PRODUCER!=NULL)&&($LANGUAGE==NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE producer = '$PRODUCER' AND genre = '$GENRE' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES==NULL)&&($GENRE!=NULL)&&($PRODUCER==NULL)&&($LANGUAGE!=NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE language = '$LANGUAGE' AND genre = '$GENRE' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES==NULL)&&($GENRE==NULL)&&($PRODUCER!=NULL)&&($LANGUAGE!=NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE producer = '$PRODUCER' AND language = '$LANGUAGE' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES!=NULL)&&($GENRE!=NULL)&&($PRODUCER!=NULL)&&($LANGUAGE==NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE name = '$MOVIES' AND genre = '$GENRE' AND producer = '$PRODUCER' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES!=NULL)&&($GENRE!=NULL)&&($PRODUCER==NULL)&&($LANGUAGE!=NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE name = '$MOVIES' AND genre = '$GENRE' AND language = '$LANGUAGE' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES!=NULL)&&($GENRE==NULL)&&($PRODUCER!=NULL)&&($LANGUAGE!=NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE name = '$MOVIES' AND language = '$LANGUAGE' AND producer = '$PRODUCER' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES==NULL)&&($GENRE!=NULL)&&($PRODUCER!=NULL)&&($LANGUAGE!=NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE language = '$LANGUAGE' AND genre = '$GENRE' AND producer = '$PRODUCER' order by $SORT $SORTORDER");
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
            }
            else if(($MOVIES!=NULL)&&($GENRE!=NULL)&&($PRODUCER!=NULL)&&($LANGUAGE!=NULL)){
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies WHERE name = '$MOVIES' AND genre = '$GENRE' AND producer = '$PRODUCER' AND language = '$LANGUAGE' order by $SORT $SORTORDER");
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
            }
            else{
                $q = mysqli_query($con,"SELECT name, producer, genre, language FROM movies order by $SORT $SORTORDER");
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
            }
    ?>
</div>
</div>
<script>
function myFunction() {
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
</html>