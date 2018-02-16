<style>

    .newfile {
        border-radius: 5px;
        background-color: lightgreen;
        padding: 20px;
        margin: 8px 8px 8px 210px;
    }

</style>
<div class="newfile">
    <form action="/?page=file" method="post" enctype="multipart/form-data">
        <label for="imgSelect"><b>Wybierz zdjęcie:</b></label>
        <input type="file" name="imgSelect" id="imgSelect" required>
        <input type="submit" name="submit" value="Upload">
        <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed.</p>
    </form>
</div>
<?php
if(isset($_POST['submit'])){
    $imagesDir = __DIR__.'/web/images/';
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    if (!$finfo) {
        die('Wystąpił błąd(finfo)!');
    }
    $mimeType = finfo_file($finfo,$_FILES['imgSelect']['tmp_name']);
    if (!$mimeType) {
        die('Wystąpił błąd(rozszerzenie)!');
    }
    if ($mimeType === 'image/jpeg' || $mimeType === 'image/gif' || $mimeType === 'image/png'){
        $fileName = $_FILES['imgSelect']['name'];
        if (is_file($imagesDir.$fileName)){
            $message = $fileName.' wybrana nazwa już istnieje!.';
            echo htmlEscape($message);
        }
        elseif (move_uploaded_file($_FILES['imgSelect']['tmp_name'],$imagesDir.$fileName)){
            $message = $fileName.' zdjęcie dodane!';
            echo htmlEscape($message);

            require_once ('connectDB.php');
            // Query
            $src = htmlEscape("/images/".$_FILES['imgSelect']['name']);
            $stmt = $pdo->query("INSERT INTO images VALUES(NULL,'$src')");
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            $message = $fileName.' nie został dodany!';
            echo htmlEscape($message);
        }
    } else {
        $message = 'Error! Wybrany plik posiada nieprawidłowe rozszerzenie!';
        echo htmlEscape($message);
    }

}