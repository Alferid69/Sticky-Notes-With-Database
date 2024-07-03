<?php
// Include the connection file to establish a connection to the database
include("connection.php");

// Retrieve username and password from the session
$username = $_SESSION['username'];

// Array of colors for the sticky notes
$colors = array("yellow", "deepskyblue", "#ff7eb9", "#ff65a3", "#7afcff", "#feff9c", "#fff740", "#76c0d6", "#ffc14a", "#46c45a", "#fa4c15", "#f51b00", "#c21c31", "#71d7ff");

// SQL query to select notes belonging to the user
$query = "SELECT Note,id FROM notes where username_n = '$username'";
$result = $conn->query($query);

// Arrays to store notes and their corresponding IDs
$Notes = array();
$note_ids = array();

// Fetch notes and IDs from the database
while ($rows = $result->fetch_assoc()) {
    $Notes[] = $rows['Note'];
    $note_ids[] = $rows['id'];
}

// Get the number of notes
$div_numbers = count($Notes);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Notes</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Link to custom CSS file -->
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <!-- Header Section -->
    <header>
        <!-- Create Note Button -->
        <div class="create">
            <button id="createbtn" type="button" class="btn btn-success">Create Note</button>
        </div>
        <!-- Redirect Link to View Group Members -->
        <div class="redirect-link">
            <a href="group_members.html" class="btn-redirect">View Group Members</a>
        </div>
        <!-- Logout Container -->
        <div class="logout-container">
            <form action="logout.php" method="post">
                <button type="submit" class="btn btn-danger">LOG OUT</button>
            </form>
        </div>
    </header>

    <!-- Note Creater Section -->
    <div class="note-creater" id="note-creater">
        <form id="note-form" action="note_submit.php" method="POST">
            <textarea id="note-text" spellcheck="false" placeholder="Create Note..." maxlength="100" name="input_note" required></textarea>
            <button class="save" type="submit"><i class="fa-regular fa-circle-check" id="save"></i></button>
        </form>
        <i class="fa-regular fa-circle-xmark" id="cancel" style="margin-left: 50%;"></i>
    </div>

    <!-- Main Section for Created Notes -->
    <main class="created-notes" id="created-notes" style="margin-top: 45px;">
        <?php
        // Iterate through each note and display it as a sticky note
        for ($i = 0; $i < $div_numbers; $i++) {
            $degree = rand(-20, 10);
            $degree = "rotate(" . $degree . "deg)";
        ?>
            <!-- Sticky Note Element -->
            <div style="
            box-shadow: 10px 20px 30px 0px rgba(0, 0, 0, 0.75);
            transition: transform 0.2s;
            padding: 10px;
            background-color:<?php echo $colors[$i]; ?>;
            height: 250px;
            width: 250px;
            color: black;
            z-index: 0;
            transform: <?php echo $degree; ?>;"
                onmouseenter="this.style.transform='rotate(0deg) scale(1.1)'; this.style.zIndex='2'"
                onmouseleave="this.style.transform='<?php echo $degree; ?> scale(1)'; this.style.zIndex='0'"
                ondblclick="window.location.href='delete_note.php?username=<?php echo $username; ?>&note_id=<?php echo $note_ids[$i]; ?>';"
                title="Double-click to delete this note";>
                <h1><?php echo $Notes[$i]; ?></h1>
            </div>
        <?php
        }
        ?>
    </main>

    <!-- JavaScript for Note Creater -->
    <script>
        var create = document.getElementById("createbtn");
        var cancel = document.getElementById("cancel");
        var noteField = document.getElementById("note-creater");

        create.addEventListener("click", showNoteCreater);
        cancel.addEventListener("click", hideNoteCreater);

        function showNoteCreater() {
            noteField.setAttribute("style", "display: block");
        }

        function hideNoteCreater() {
            noteField.setAttribute("style", "display: none");
        }
    </script>

</body>

</html>
