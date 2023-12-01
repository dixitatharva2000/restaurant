<form method="post" action="<?= base_url('edit-restaurent/' . $values[0]->restaurent_id); ?>">
  <div class="row">
    <div class="form-group col-6">
      <label for="restaurentname">Restaurent Name</label>
      <input type="text" id="restaurentname" class="form-control" value="<?= $values[0]->restaurent_name; ?>"
        name="restaurent_name">
    </div>

    <div class="form-group col-6">
      <label for="openingdate">Opening Date</label>
      <input type="date" id="openingdate" class="form-control" name="opening_date"
        value="<?= $values[0]->opening_date; ?>">
    </div>

    <div class="form-group col-6">
      <label for="ownername">Owner Name</label>
      <input type="text" id="ownername" class="form-control" value="<?= $values[0]->owner_name; ?>" name="owner_name">
    </div>

    <div class="form-group col-6">
      <label for="contact">Contact Number</label>
      <input type="text" id="contact" class="form-control" value="<?= $values[0]->phone; ?>" name="phone">
    </div>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" id="email" class="form-control" value="<?= $values[0]->email; ?>" name="email">
  </div>

  <div class="row">
    <div class="form-group col-6">
      <label for="monthlyrevenue">Monthly Revenue</label>
      <input type="text" id="monthlyrevenue" class="form-control" value="<?= $values[0]->monthly_revenue; ?>"
        name="monthly_revenue">
    </div>

    <div class="form-group col-6">
      <label for="monthlyexpenses">Monthly Expenses</label>
      <input type="text" id="monthlyexpenses" class="form-control" value="<?= $values[0]->monthly_expenses; ?>"
        name="monthly_expenses">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-6">
      <label for="agreementdate">Agreement Date</label>
      <input type="date" id="agreementdate" class="form-control" value="<?= $values[0]->agreement_date; ?>"
        name="agreement_date">
    </div>

    <div class="form-group col-6">
      <label for="renewaldate">Renewal Date</label>
      <input type="date" id="renewaldate" class="form-control" value="<?= $values[0]->renewal_date; ?>"
        name="renewal_date">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-6">
      <label for="franchise">Franchise or Not?</label>
      <select name="franchise" class="form-control" id="">
        <option selected disabled>
          <?= $values[0]->franchise; ?>
        </option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>

    <div class="form-group col-6">
      <label for="currentstatus">Current Status</label>
      <select name="current_status" class="form-control">
        <option selected disabled>
          <?= $values[0]->current_status; ?>
        </option>
        <option value="Active">Active</option>
        <option value="Closed">Closed</option>
        <option value="Under Renovation">Under Renovation</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="Location">Location</label>
    <textarea name="address" id="Location" rows="3" class="form-control"><?= $values[0]->address; ?></textarea>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success btn-sm" onclick="insertdata()">Add Restaurent</button>
  </div>
</form>