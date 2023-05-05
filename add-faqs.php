<style>
  <?php include "admin-style.css" ?>
</style>
 <h2>Add FAQ's</h2>
    <form action="add-faqs-function.php" method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="grid-container">
        <div class="grid-item">
          <label for="input1">Add Question</label>
          <input type="text" name="question">
        </div>
        <div class="grid-item">
          <label for="input1">Add Response</label>
          <input type="text" id="time" name="answer">
        </div>
        
      </div>
        <button type="submit" name="set" id="add-submit-modal">Add</button>
        </form>

        <form action="./admin-faqs-index.php">
        <button type="submit" id="add-close-modal" class="closee" href="admin-faqs-index.php">Close</button>
                        </form>
       
    
    

    
