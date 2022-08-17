<html>
<body>

<form action="#">

<div>
    <h2>Create Journal Entry Form</h2>

  <form method="post" action="src/test.php">
    <div class="row">
      <div class="column-25">
        <label for="title">Title</label>
      </div>
      <div class="column-75">
        <input type="text" id="title" name="title" placeholder="Entry title.." required>
      </div>
    </div>
    <div class="row">
      <div class="column-25">
        <label for="authors">Authors</label>
      </div>
      <div class="column-75">
        <input type="text" id="authors" name="authors" placeholder="List of authors can be comma separated.." required>
      </div>
    </div>
    <div class="row">
      <div class="column-25">
        <label for="topic">Topic</label>
      </div>
      <div class="column-75">
        <select id="topic" name="topic">
          <option disabled selected value> -- this should somehow support multiple values -- </option>
          <option value="test">Testing</option>
          <option value="php">PHP</option>
          <option value="docker">Docker</option>
          <option value="mysql">MySQL</option>
          <option value="git">Git</option>
          <option value="cli">CLI/Terminal/Bash</option>
          <option value="regex">Regular Expressions</option>
          <option value="js">JavaScript</option>
          <option value="html">HTML</option>
          <option value="css">CSS</option>
          <option value="be-frameworks">Backend Frameworks</option>
          <option value="fe-frameworks">Frontend Frameworks</option>
          <option value="env">Environments</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="column-25">
        <label for="progress_perc">Progress%</label>
    </div>
      <div class="column-75">
      <input type="number" id="progress_perc" name="progress_perc" min="0" max="100"></input>
      </div>
    </div>
    <div class="row">
      <div class="column-25">
        <label for="spent_hours">Hours</label>
    </div>
      <div class="column-75">
      <input type="number" id="spent_hours" name="spent_hours" min="0"></input>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="column-25">
        <label for="content">Content</label>
      </div>
      <div class="column-75">
        <textarea id="content" name="content" placeholder="Write something.." style="height:200px" required></textarea>
      </div>
    </div>
    <div class="row">
      <div class="column-25">
        <label for="tags">Tags</label>
      </div>
      <div class="column-75">
        <input type="text" id="tags" name="tags" placeholder="Optional tags for searching and sorting, can be comma separated..">
      </div>
    </div>
    <br>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
  
</form>
    <?php require("../src/db_connection.php");

        if ($title) {
            $query = "INSERT INTO test.articles
                        (title,authors,topic,progress_perc,spent_hours,content,tags)
                            VALUES
                        (:title, :authors, :topic, :progress_perc, :spent_hours, :content, :tags)";
            $statement = $conn->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':authors', $authors);
            $statement->bindValue(':topic', $topic);
            $statement->bindValue(':progress_perc', $progress_perc);
            $statement->bindValue(':spent_hours', $spent_hours);
            $statement->bindValue(':content', $content);
            $statement->bindValue(':tags', $tags);
            $statement->execute();
            $statement->closeCursor();
        }
    ?>



</body>
</html>