<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data Information</title>
</head>
<body>
    <div class="container">
        <form action="<?= base_url("Save") ?>" method="post">
            <?php if(isset($d['ID'])){?>
                <input type="hidden" name="ID" value="<?=$d['ID']?>">
            <?php }?>
            
            <label for="StudName">Name: </label> 
            <input type="text" id="StudName" placeholder="Student Name" name="StudName" required value="<?= isset($d['StudName']) ? $d['StudName'] : '' ?>">
            <br>
            <label for="StudGender">Gender: </label>
            <select type="box" name="StudGender" placeholder="Student Gender" name="StudGender" required value="<?= isset($d['StudGender']) ? $d['StudGender'] : '' ?>">>
                <option></option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
            </select>
            <br>
            <label for="StudCourse">Course: </label>
            <input type="text" id="StudCourse" placeholder="Student Course" name="StudCourse" required value="<?= isset($d['StudCourse']) ? $d['StudCourse'] : '' ?>">
            <br>
            <label for="StudSection">Section: </label>
            <input type="text" id="StudSection" placeholder="Student Section" name="StudSection" required value="<?= isset($d['StudSection']) ? $d['StudSection'] : '' ?>">
            <br>
            <label for="StudYear">Year Level: </label>
            <input type="number" id="StudYear" placeholder="Student Year Level" name="StudYear" required value="<?= isset($d['StudYear']) ? $d['StudYear'] : '' ?>">
            <br>
            <input type="submit" value="Save">
        </form>

        <h2>STUDENT INFORMATION</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Course</th>
                <th>Section</th>
                <th>YearLevel</th>
                <th>Action</th>
            </tr>

            <?php foreach($main as $k): ?>
                <tr>
                    <th><?=$k['ID']   ?></th>
                    <th><?=$k['StudName'] ?></th>
                    <th><?=$k['StudGender'] ?></th>
                    <th><?=$k['StudCourse'] ?></th>
                    <th><?=$k['StudSection'] ?></th>
                    <th><?=$k['StudYear'] ?></th>
                    <th><a href="/Update/<?=$k['ID']?>">Update</a> || <a href="/Delete/<?=$k['ID']?>">Delete</a> </th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>