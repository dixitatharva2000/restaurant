<form method="post" action="<?= base_url('edit-franchise/' . $values[0]->franchise_id); ?>">
  <div class="row">
    <div class="form-group col-6">
      <label for="restaurent">Choose Restaurent</label>
      <select name="restaurent_id" class="form-control" id="">
        <option disabled selected value="restaurent_id">
          <?= $values[0]->restaurent_name; ?>
        </option>
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
      <label for="franchisename">franchise Name</label>
      <input type="text" id="franchisename" class="form-control" name="franchise_name"
        value="<?= $values[0]->franchise_name; ?>">
    </div>

    <div class="form-group col-6">
      <label for="ownername">Owner's Name</label>
      <input type="text" id="ownername" class="form-control" value="<?= $values[0]->franchise_owner_name; ?>"
        name="franchise_owner_name">
    </div>

    <div class="form-group col-6">
      <label for="openingdate">Opening Date</label>
      <input type="date" id="openingdate" class="form-control" value="<?= $values[0]->franchise_opening_date; ?>"
        name="franchise_opening_date">
    </div>

    <div class="form-group col-6">
      <label for="contact">Contact Number</label>
      <input type="text" id="contact" class="form-control" value="<?= $values[0]->franchise_phone; ?>" name="franchise_phone">
    </div>
    <div class="form-group col-6">
      <label for="email">Email</label>
      <input type="text" id="email" class="form-control" value="<?= $values[0]->franchise_email; ?>" name="franchise_email">
    </div>
  </div>


  <div class="row">
    <div class="form-group col-6">
      <label for="monthlyrevenue">Monthly Revenue</label>
      <input type="text" id="monthlyrevenue" class="form-control" value="<?= $values[0]->franchise_monthly_revenue; ?>"
        name="franchise_monthly_revenue">
    </div>

    <div class="form-group col-6">
      <label for="monthlyexpenses">Monthly Expenses</label>
      <input type="text" id="monthlyexpenses" class="form-control" value="<?= $values[0]->franchise_monthly_expenses; ?>"
        name="franchise_monthly_expenses">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-6">
      <label for="agreementdate">Agreement Date</label>
      <input type="date" id="agreementdate" class="form-control" value="<?= $values[0]->franchise_agreement_date; ?>"
        name="franchise_agreement_date">
    </div>

    <div class="form-group col-6">
      <label for="renewaldate">Renewal Date</label>
      <input type="date" id="renewaldate" class="form-control" value="<?= $values[0]->franchise_renewal_date; ?>"
        name="franchise_renewal_date">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-12">
      <label for="currentstatus">Current Status</label>
      <select name="franchise_current_status" class="form-control" id="">
        <option selected disabled>
          <?= $values[0]->franchise_current_status; ?>
        </option>
        <option value="Active">Active</option>
        <option value="Closed">Closed</option>
        <option value="Under Renovation">Under Renovation</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="Location">Location</label>
    <textarea name="franchise_address" id="Location" rows="3" class="form-control"><?= $values[0]->franchise_address; ?></textarea>
  </div>


  <div class="modal-footer">
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-warning btn-sm" onclick="insertdata()">Update franchise</button>
  </div>
</form>