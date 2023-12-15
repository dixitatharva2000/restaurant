<form method="post" enctype="multipart/form-data" action="<?=base_url('edit-category/'.$values[0]->category_id);?>">
          <div class="row">
            
            <div class="form-group col-6">
              <label for="category_name">category_name</label>
              <input type="text" id="category_name" class="form-control" name="category_name" value="<?=$values[0]->category_name;?>">
            </div>



            <div class="form-group col-6">
              <label for="status">status</label>
              <select name="status" class="form-control" id="" >
              <option selected disabled>
          <?= $values[0]->status; ?>
        </option>
                <option value="Active">Active</option>
                <option value="Closed">Closed</option>
                <option value="Under Renovation">Under Renovation</option>
              </select>
            </div>

          </div>   
        
          <div class="row">
          <div class="form-group col-12">
                <label for="item_description">description</label>
                <textarea name="description" id="description" rows="3" class="form-control"
                placeholder="description" value=""><?=$values[0]->description;?></textarea>
            </div>
          </div> 

          <div class="row">
            <div class="form-group col-6">
              <label for="created_date">created_date</label>
              <input type="date" id="created_date" class="form-control" name="created_date" value="<?=$values[0]->created_date;?>">
            </div>
            <div class="form-group col-6">
              <label for="updated_date">updated_date</label>
              <input type="date" id="updated_date" class="form-control" name="updated_date" value="<?=$values[0]->updated_date;?>">
            </div>
          </div>

         
         

         

          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm" onclick="insertdata()">Edit Category</button>
          </div>

        </form>