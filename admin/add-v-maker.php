<?php require "sidebar.php";
require "../lockscreen/connection.php";
$type_name = "";



if (isset($_POST['submit'])) {

  $type_name = mysqli_real_escape_string($con, $_POST['type-name']);

  //check for update
  if (isset($_GET['id'])) {
    $id  = $_GET["id"];
    $update_sql = "UPDATE car_type SET name='$type_name' WHERE car_type_id = $id";
    if (mysqli_query($con, $update_sql)) {
      echo "<script> location.href='../admin/v-type.php'; </script>";
    } else {
      echo "<script>alert('Error while updating type...');</script>";
    }
  }

  $add_sql = "INSERT INTO car_type(car_type_id,name) VALUES ('','$type_name')";
  if (mysqli_query($con, $add_sql)) {
    echo "<script> location.href='../admin/v-type.php'; </script>";
  } else {
    echo "<script>alert('Error while adding type...');</script>";
  }
}
if (isset($_POST['cancel'])) {
  echo "<script> location.href='../admin/v-type.php'; </script>";
}


?>


<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      New vehicle maker
    </h2>
    <form action="" method="POST" autocomplete="">
      <?php
      if (isset($_GET["id"])) {
        $id  = $_GET["id"];
        $sql = "select * from car_type where car_type_id = $id";
        $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
        $type_name = $row['name'];
      }
      ?>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Car Type Name</span>

          <input value="<?php echo $type_name; ?>" type="text" name="type-name" id="maker-name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Car Type" required '/>
        </label>
          <br>       
        <div>
          <a href="">
            <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Submit
            </button></a>
          <a href="">
            <button name="cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg 
            active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" formnovalidate>
              Cancel
            </button></a>
        </div>
        <!-- Validation inputs -->
       
      </div>
    </form>
  </div>
  </div>
</main>
</div>
</div>
</body>
</html>