<?php
$pageTitle = "الإدارة";
include './header.php';
include './nav.php';
session_start();
if(!isset($_SESSION['AdminId'])) {
    header('Location: manage-login.php');
    exit();
}
?>

<?php
include 'config/connection.php';
$stmt = $conn->prepare('SELECT * from graduates');
$stmt->execute();
$result_count = $stmt->rowCount();
if($result_count > 0) {
    $result_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else{
}

?>
    <div class="manage-wrapper">
        <div class="account-control-wrapper">
            <div class="container">
                <div class="side">
                    <a href="manage-edit.php" class="account-edit">تعديل معلومات الحساب</a>
                    <a href="manage-register.php" class="account-edit">انشاء حساب جديد</a>
                    <a href="#" class="account-delete">حذف الحساب</a>
                </div>
                <div class="side">
                    <a href="manage-logout.php" class="account-logout">تسجيل الخروج</a>
                </div>
            </div>
        </div>
        <div class="items-table-wrapper">
            <div class="container">
                <table id="itemsTable" style="direction: ltr;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fullname</th>
                            <th>Fullname (Eng)</th>
                            <th>Year</th>
                            <th>Department</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Document To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        if(isset($result_items)) {
                            $id = 1;
                            foreach($result_items as $result_item) {
                                echo '<tr>';
                                    echo '<td>'.$id++.'</td>';
                                    echo '<td>'.$result_item['fullname'].'</td>';
                                    echo '<td>'.$result_item['fullname_eng'].'</td>';
                                    echo '<td>'.$result_item['year']. ' - '. intval($result_item['year'])+ 1 .'</td>';
                                    echo '<td>'.$result_item['department'].'</td>';
                                    echo '<td>'.$result_item['address'].'</td>';
                                    echo '<td>'.$result_item['phone'].'</td>';
                                    echo '<td>'.$result_item['document_to'].'</td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>

    <script src="js/vanilla-dataTables.min.js"></script>
    <script>

        // Prepare 'DataTable' Table
        var myTable = document.querySelector("#itemsTable");
        var dataTable = new DataTable(myTable);

        // Deleting Admin Click Button
        let deleteBtn = document.querySelector('.account-control-wrapper .account-delete');
        deleteBtn.onclick = function(e) {
            e.preventDefault();
            let answer = confirm("هل أنت متأكد أنك تريد حذف الحساب ؟");
            if(answer == true) {
                fetch("manage-delete-process.php", {
                    method: "POST",
                }).then(response => response.json()).then(data => {
                    if(data.msg == 'success') {
                        window.location.href = 'manage-logout.php'
                    }
                })
            }
        }
    </script>
    </body>
</html>