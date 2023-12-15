<form method="post" action="<?= base_url('edit-table/' . $values[0]->table_id); ?>">
  <div class="row">
    <div class="form-group col-6">
      <label for="restaurent">Choose Restaurant</label>
      <select name="restaurent_id" class="form-control" onchange="getStates(this.value)">
        <option value="<?= $values[0]->restaurent_id; ?>" selected disabled><?= $values[0]->restaurent_name; ?></option>
        <?php foreach ($restaurent as $value) {
          if ($value->franchise === 'Yes') {
            ?>
            <option value="<?= $value->restaurent_id; ?>">
              <?= $value->restaurent_name; ?>
            </option>
            <?php
          }
        } ?>
      </select>
    </div>

    <div class="form-group col-6">
      <label for="franchisename">Franchise Name</label>
      <select class="form-control" name="franchise_id" id="franchise">
        <option value="<?= $values[0]->franchise_id; ?>" selected>
          <?= $values[0]->franchise_name; ?>
        </option>
      </select>
    </div>

    <div class="form-group col-6">
      <label for="ownername">Select Table</label>
      <select name="table_number" class="form-control" id="">
        <option value="<?= $values[0]->table_number; ?>" selected>
          <?= $values[0]->table_number; ?>
        </option>
        <option value="T-01">T-01</option>
        <option value="T-02">T-02</option>
        <option value="T-03">T-03</option>
        <option value="T-04">T-04</option>
        <option value="T-05">T-05</option>
        <option value="T-06">T-06</option>
        <option value="T-07">T-07</option>
        <option value="T-08">T-08</option>
        <option value="T-09">T-09</option>
        <option value="T-10">T-10</option>
      </select>
    </div>

    <div class="form-group col-6">
      <label for="numofcustomers">Number of Customers</label>
      <input type="text" id="numofcustomers" value="<?= $values[0]->num_customer; ?>" class="form-control"
        name="num_customer">
    </div>

    <div class="form-group col-6" id="dropdown">
      <label for="exampleInputEmail1">Current Status</label>
      <select class="form-control" id="selectElement" name="status">
        <option value="<?= $values[0]->status; ?>">
          <?= $values[0]->status; ?>&nbsp;&nbsp;
          <?= $values[0]->reservation_id; ?>
        </option>
        <option value="Occupied">Occupied</option>
        <option value="Available">Available</option>
        <option value="Reserved">Reserved</option>
      </select>
    </div>

    <div class="form-group col-12" id="hiddenDiv" style="display: none;"> </div>

    <div class="form-group col-6">
      <label for="createddate">Created Date</label>
      <input type="date" id="createddate" class="form-control" value="<?= $values[0]->created_date; ?>"
        name="created_date">
    </div>

    <div class="form-group col-6">
      <label for="updateddate">Updated Date</label>
      <input type="date" id="updateddate" class="form-control" value="<?= $values[0]->updated_date; ?>"
        name="updated_date">
    </div>

    <div class="form-group col-6">
      <label for="openingdate">Location</label>
      <select name="location" class="form-control" id="">
        <option value="<?= $values[0]->location; ?>" selected>
          <?= $values[0]->location; ?>
        </option>
        <option value="Indoor">Indoor</option>
        <option value="Outdoor">Outdoor</option>
        <option value="Window">Window</option>
      </select>
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" id="btnRefresh" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success btn-sm" onclick="insertdata()">Add Franchise</button>
  </div>
</form>



<script>
  function getStates(restaurent_id) {
    $.ajax({
      url: '<?= base_url('get-franchise/'); ?>' + restaurent_id,
      success: function (result) {
        $('#franchise').html(result);
      }
    });
  }


  
</script>