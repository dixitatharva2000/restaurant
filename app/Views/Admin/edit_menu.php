<form method="post" action="<?= base_url('edit-menu/' . $values[0]->menu_id); ?>">
  <div class="row">
    <div class="form-group col-6">
      <label for="category">Choose Category</label>
      <select name="category_id" class="form-control" onchange="getStates(this.value)">
        <option value="<?= $values[0]->category_id; ?>"><?= $values[0]->category_name; ?></option>
        <?php foreach ($category as $value) { ?>
          <option value="<?= $value->category_id; ?>"><?= $value->category_name; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group col-6">
      <label for="subcategory">SubCategory Name</label>
      <select class="form-control" name="subcategory_id" id="subcategory">
        <option value="<?= $values[0]->subcategory_id; ?>" selected><?= $values[0]->subcategory_name; ?></option>
        <?php foreach ($subcategory as $value) { ?>
          <option value="<?= $value->subcategory_id; ?>">
            <?= $value->subcategory_name; ?>
          </option>
        <?php } ?>
        </option>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-6">
      <label for="item_name">item_name</label>
      <input type="text" id="item_name" class="form-control" name="item_name" value="<?= $values[0]->item_name; ?>">
    </div>
    <div class="form-group col-6">
      <label for="status">status</label>
      <input type="text" id="status" class="form-control" name="status" value="<?= $values[0]->status; ?>">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-6">
      <label for="qty">qty</label>
      <input type="text" id="item_name" class="form-control" name="qty" value="<?= $values[0]->qty; ?>">
    </div>
    <div class="form-group col-6">
      <label for="price">price</label>
      <input type="text" id="price" class="form-control" name="price" value="<?= $values[0]->price; ?>">
    </div>
  </div>



  <div class="row">
    <div class="form-group col-12">
      <label for="description">Description</label>
      <input type="text" id="description" class="form-control" name="description"
        value="<?= $values[0]->description; ?>">
    </div>

  </div>

  <div class="row">
    <div class="form-group col-6">
      <label for="createddate">Created Date</label>
      <input type="date" id="createddate" class="form-control" name="created_date"
        value="<?= $values[0]->created_date; ?>">
    </div>

    <div class="form-group col-6">
      <label for="updateddate">Updated Date</label>
      <input type="date" id="updateddate" class="form-control" name="updated_date"
        value="<?= $values[0]->updated_date; ?>">
    </div>
  </div>


  <div class="modal-footer">
    <button type="button" id="btnRefresh" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success btn-sm" onclick="insertdata()">Edit Menu</button>
  </div>
</form>



<script>
  function getStates(category_id) {
    $.ajax({
      url: '<?= base_url('get-subcategory/'); ?>' + category_id,
      success: function (result) {
        $('#subcategory').html(result);
      }
    });
  }



</script>